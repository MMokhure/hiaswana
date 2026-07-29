<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'surname'               => ['required', 'string', 'max:255'],
            'identification_number' => ['required', 'string', 'max:100'],
            'nationality'           => ['required', 'string', 'max:100'],
            'residential_address'   => ['required', 'string', 'max:500'],
            'postal_address'        => ['nullable', 'string', 'max:500'],
            'email'                 => ['required', 'email', 'unique:members,email'],
            'phone'                 => ['required', 'string', 'max:30'],
            'organization'          => ['nullable', 'string', 'max:255'],
            'category'              => ['required', 'in:Professional,Student,Associate,Institutional'],
            'motivation'            => ['nullable', 'string', 'max:1000'],
            'payment_proof'         => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'consent_privacy'       => ['accepted'],
            'consent_terms'         => ['accepted'],
        ]);

        $data['privacy_consent_at'] = now();
        $data['terms_consent_at'] = now();
        $data['consent_ip'] = $request->ip();

        unset($data['consent_privacy'], $data['consent_terms']);

        if ($request->hasFile('payment_proof')) {
            $data['payment_proof'] = $request->file('payment_proof')->store('payment-proofs', 'public');
            $data['payment_status'] = 'pending_verification';
        }

        Member::create($data);

        return back()->with('success', 'Your membership application has been submitted. We will be in touch soon!');
    }
}
