<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'unique:members,email'],
            'phone'        => ['nullable', 'string', 'max:30'],
            'organization' => ['nullable', 'string', 'max:255'],
            'category'     => ['required', 'in:Professional,Student,Associate,Institutional'],
            'motivation'   => ['nullable', 'string', 'max:1000'],
        ]);

        Member::create($data);

        return back()->with('success', 'Your membership application has been submitted. We will be in touch soon!');
    }
}
