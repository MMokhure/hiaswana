<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $query  = Member::latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        $members = $query->paginate(20)->withQueryString();
        return view('admin.members.index', compact('members', 'status'));
    }

    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    public function approve(Member $member)
    {
        $member->update(['status' => 'approved']);
        return back()->with('success', 'Member approved.');
    }

    public function reject(Member $member)
    {
        $member->update(['status' => 'rejected']);
        return back()->with('success', 'Member rejected.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Member deleted.');
    }
}
