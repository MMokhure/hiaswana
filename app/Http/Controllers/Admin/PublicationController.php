<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::latest()->paginate(15);
        return view('admin.publications.index', compact('publications'));
    }

    public function create()
    {
        return view('admin.publications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'author'      => ['nullable', 'string', 'max:255'],
            'year'        => ['nullable', 'digits:4', 'integer'],
            'type'        => ['required', 'in:PDF,Link,Report,Guideline,Case Study'],
            'file_url'    => ['nullable', 'string', 'max:500'],
            'file'        => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'status'      => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('file')) {
            $data['file_url'] = $request->file('file')->store('publications', 'public');
        }
        unset($data['file']);

        Publication::create($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication created successfully.');
    }

    public function edit(Publication $publication)
    {
        return view('admin.publications.edit', compact('publication'));
    }

    public function update(Request $request, Publication $publication)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'author'      => ['nullable', 'string', 'max:255'],
            'year'        => ['nullable', 'digits:4', 'integer'],
            'type'        => ['required', 'in:PDF,Link,Report,Guideline,Case Study'],
            'file_url'    => ['nullable', 'string', 'max:500'],
            'file'        => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'status'      => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('file')) {
            if ($publication->file_url && !str_starts_with($publication->file_url, 'http')) {
                Storage::disk('public')->delete($publication->file_url);
            }
            $data['file_url'] = $request->file('file')->store('publications', 'public');
        }
        unset($data['file']);

        $publication->update($data);

        return redirect()->route('admin.publications.index')->with('success', 'Publication updated successfully.');
    }

    public function destroy(Publication $publication)
    {
        if ($publication->file_url && !str_starts_with($publication->file_url, 'http')) {
            Storage::disk('public')->delete($publication->file_url);
        }
        $publication->delete();
        return redirect()->route('admin.publications.index')->with('success', 'Publication deleted.');
    }
}
