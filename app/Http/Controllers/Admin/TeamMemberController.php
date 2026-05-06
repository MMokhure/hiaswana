<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['required', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['required', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo) {
            Storage::disk('public')->delete($team->photo);
        }
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }
}
