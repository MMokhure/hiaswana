<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('location')->orderBy('sort_order')->get();
        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'      => ['nullable', 'string', 'max:255'],
            'subtitle'   => ['nullable', 'string', 'max:500'],
            'image'      => ['required', 'image', 'max:4096'],
            'location'   => ['required', 'in:hero,about'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        $data['image_path'] = $request->file('image')->store('slides', 'public');
        $data['is_active']  = $request->boolean('is_active', true);
        unset($data['image']);

        Slide::create($data);

        return redirect()->route('admin.slides.index')->with('success', 'Slide added successfully.');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $data = $request->validate([
            'title'      => ['nullable', 'string', 'max:255'],
            'subtitle'   => ['nullable', 'string', 'max:500'],
            'image'      => ['nullable', 'image', 'max:4096'],
            'location'   => ['required', 'in:hero,about'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($slide->image_path) {
                Storage::disk('public')->delete($slide->image_path);
            }
            $data['image_path'] = $request->file('image')->store('slides', 'public');
        } elseif ($request->boolean('remove_image')) {
            if ($slide->image_path) {
                Storage::disk('public')->delete($slide->image_path);
            }
            $data['image_path'] = null;
        }

        $data['is_active'] = $request->boolean('is_active', true);
        unset($data['image']);

        $slide->update($data);

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully.');
    }

    public function toggle(Slide $slide)
    {
        $slide->update(['is_active' => !$slide->is_active]);
        $status = $slide->is_active ? 'visible on site' : 'hidden from site';
        return back()->with('success', "Slide {$status}.");
    }

    public function destroy(Slide $slide)
    {
        Storage::disk('public')->delete($slide->image_path);
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Slide deleted.');
    }
}
