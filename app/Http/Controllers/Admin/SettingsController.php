<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    private array $groups = [
        'general'  => 'General',
        'media'    => 'Images & Branding',
        'contact'  => 'Contact & Location',
        'social'   => 'Social Media',
        'homepage' => 'Homepage',
        'services' => 'Services / Initiatives',
        'footer'   => 'Footer',
        'pages'    => 'Page Content',
    ];

    public function index()
    {
        return redirect()->route('admin.settings.group', 'general');
    }

    public function group(string $group)
    {
        if (! array_key_exists($group, $this->groups)) {
            abort(404);
        }

        $settings = Setting::where('group', $group)->orderBy('sort_order')->get();
        $groupLabel = $this->groups[$group];
        $groups = $this->groups;

        return view('admin.settings.group', compact('settings', 'group', 'groupLabel', 'groups'));
    }

    public function update(Request $request, string $group)
    {
        if (! array_key_exists($group, $this->groups)) {
            abort(404);
        }

        // Collect image-type setting keys for this group
        $imageKeys = Setting::where('group', $group)->where('type', 'image')->pluck('key')->toArray();

        // Validate any uploaded images before saving anything
        $imageValidation = [];
        foreach ($imageKeys as $key) {
            if ($request->hasFile($key)) {
                $imageValidation[$key] = ['image', 'max:4096'];
            }
        }
        if ($imageValidation) {
            $request->validate($imageValidation);
        }

        // Save non-image inputs (skip image keys to avoid saving temp paths)
        $inputs = $request->except(array_merge(['_token', '_method'], $imageKeys));

        // Ensure checkbox/boolean settings persist as 0 when unchecked.
        $booleanKeys = Setting::where('group', $group)
            ->whereIn('type', ['checkbox', 'boolean'])
            ->pluck('key')
            ->toArray();

        foreach ($booleanKeys as $key) {
            $inputs[$key] = $request->has($key) ? '1' : '0';
        }

        foreach ($inputs as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value ?? '']);
        }

        // Handle image uploads
        foreach ($imageKeys as $key) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);

                // Delete old file
                $old = Setting::where('key', $key)->value('value');
                if ($old) {
                    Storage::disk('public')->delete($old);
                }

                $path = $file->store('settings', 'public');
                Setting::where('key', $key)->update(['value' => $path]);
            }
        }

        Setting::flush();

        return redirect()->route('admin.settings.group', $group)->with('success', 'Settings saved successfully.');
    }
}
