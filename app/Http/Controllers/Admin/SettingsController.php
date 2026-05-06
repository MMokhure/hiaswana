<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private array $groups = [
        'general'  => 'General',
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

        $inputs = $request->except(['_token', '_method']);

        foreach ($inputs as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value ?? '']);
        }

        Setting::flush();

        return redirect()->route('admin.settings.group', $group)->with('success', 'Settings saved successfully.');
    }
}
