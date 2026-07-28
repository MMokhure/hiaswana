<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommitteeController extends Controller
{
    // ── Committees ────────────────────────────────────────────────────────────

    public function index()
    {
        $committees = Committee::withCount('members')->orderBy('sort_order')->get();
        return view('admin.committees.index', compact('committees'));
    }

    public function create()
    {
        return view('admin.committees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Committee::create($data);

        return redirect()->route('admin.committees.index')->with('success', 'Committee created.');
    }

    public function show(Committee $committee)
    {
        $committee->load('members');
        return view('admin.committees.show', compact('committee'));
    }

    public function edit(Committee $committee)
    {
        return view('admin.committees.edit', compact('committee'));
    }

    public function update(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'is_active'   => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $committee->update($data);

        return redirect()->route('admin.committees.show', $committee)->with('success', 'Committee updated.');
    }

    public function destroy(Committee $committee)
    {
        // Delete member photos
        foreach ($committee->members as $m) {
            if ($m->photo) Storage::disk('public')->delete($m->photo);
        }
        $committee->delete();

        return redirect()->route('admin.committees.index')->with('success', 'Committee deleted.');
    }

    // ── Committee Members ─────────────────────────────────────────────────────

    public function memberCreate(Committee $committee)
    {
        return view('admin.committees.member-form', compact('committee'));
    }

    public function memberStore(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'role'         => ['required', 'string', 'max:255'],
            'email'        => ['nullable', 'email', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'organization' => ['nullable', 'string', 'max:255'],
            'bio'          => ['nullable', 'string'],
            'photo'        => ['nullable', 'image', 'max:2048'],
            'sort_order'   => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('committees', 'public');
        }

        $data['committee_id'] = $committee->id;
        $data['sort_order']   = $data['sort_order'] ?? 0;

        CommitteeMember::create($data);

        return redirect()->route('admin.committees.show', $committee)->with('success', 'Member added.');
    }

    public function memberEdit(Committee $committee, CommitteeMember $member)
    {
        return view('admin.committees.member-form', compact('committee', 'member'));
    }

    public function memberUpdate(Request $request, Committee $committee, CommitteeMember $member)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'role'         => ['required', 'string', 'max:255'],
            'email'        => ['nullable', 'email', 'max:255'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'organization' => ['nullable', 'string', 'max:255'],
            'bio'          => ['nullable', 'string'],
            'photo'        => ['nullable', 'image', 'max:2048'],
            'sort_order'   => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) Storage::disk('public')->delete($member->photo);
            $data['photo'] = $request->file('photo')->store('committees', 'public');
        }

        $data['sort_order'] = $data['sort_order'] ?? $member->sort_order;

        $member->update($data);

        return redirect()->route('admin.committees.show', $committee)->with('success', 'Member updated.');
    }

    public function memberDestroy(Committee $committee, CommitteeMember $member)
    {
        if ($member->photo) Storage::disk('public')->delete($member->photo);
        $member->delete();

        return redirect()->route('admin.committees.show', $committee)->with('success', 'Member removed.');
    }
}
