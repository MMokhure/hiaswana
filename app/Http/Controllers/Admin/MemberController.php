<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $search = $request->get('search');
        $query  = Member::latest();

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('organization', 'like', "%{$search}%")
                  ->orWhere('membership_number', 'like', "%{$search}%");
            });
        }

        $members = $query->paginate(20)->withQueryString();

        $counts = [
            'all'      => Member::count(),
            'pending'  => Member::where('status', 'pending')->count(),
            'approved' => Member::where('status', 'approved')->count(),
            'rejected' => Member::where('status', 'rejected')->count(),
        ];

        return view('admin.members.index', compact('members', 'status', 'search', 'counts'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'surname'               => ['nullable', 'string', 'max:255'],
            'identification_number' => ['nullable', 'string', 'max:100'],
            'nationality'           => ['nullable', 'string', 'max:100'],
            'residential_address'   => ['nullable', 'string', 'max:500'],
            'postal_address'        => ['nullable', 'string', 'max:500'],
            'email'                 => ['required', 'email', 'unique:members,email'],
            'phone'                 => ['nullable', 'string', 'max:30'],
            'organization'          => ['nullable', 'string', 'max:255'],
            'category'              => ['required', 'in:Professional,Student,Associate,Institutional'],
            'status'                => ['required', 'in:pending,approved,rejected'],
            'motivation'            => ['nullable', 'string', 'max:1000'],
            'notes'                 => ['nullable', 'string', 'max:2000'],
        ]);

        if ($data['status'] === 'approved') {
            $data['membership_number'] = Member::generateMembershipNumber();
            $data['approved_at']       = now();
        }

        $member = Member::create($data);

        return redirect()->route('admin.members.show', $member)->with('success', 'Member added successfully.');
    }

    public function show(Member $member)
    {
        return view('admin.members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $data = $request->validate([
            'name'                  => ['required', 'string', 'max:255'],
            'surname'               => ['nullable', 'string', 'max:255'],
            'identification_number' => ['nullable', 'string', 'max:100'],
            'nationality'           => ['nullable', 'string', 'max:100'],
            'residential_address'   => ['nullable', 'string', 'max:500'],
            'postal_address'        => ['nullable', 'string', 'max:500'],
            'email'                 => ['required', 'email', 'unique:members,email,' . $member->id],
            'phone'                 => ['nullable', 'string', 'max:30'],
            'organization'          => ['nullable', 'string', 'max:255'],
            'category'              => ['required', 'in:Professional,Student,Associate,Institutional'],
            'notes'                 => ['nullable', 'string', 'max:2000'],
        ]);

        $member->update($data);

        return redirect()->route('admin.members.show', $member)->with('success', 'Member updated.');
    }

    public function approve(Member $member)
    {
        $number = Member::generateMembershipNumber();

        $member->update([
            'status'            => 'approved',
            'membership_number' => $number,
            'approved_at'       => now(),
        ]);

        return back()->with('success', "Member approved. Membership number: {$number}");
    }

    public function reject(Member $member)
    {
        $member->update(['status' => 'rejected']);
        return back()->with('success', 'Member rejected.');
    }

    public function verifyPayment(Member $member)
    {
        $member->update(['payment_status' => 'paid']);
        return back()->with('success', 'Payment verified for ' . $member->name . '.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Member deleted.');
    }

    public function export(): StreamedResponse
    {
        $members = Member::where('status', 'approved')->orderBy('approved_at')->get();

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="hiaswana-members-' . now()->format('Y-m-d') . '.csv"',
        ];

        return response()->stream(function () use ($members) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Membership No.', 'Name', 'Surname', 'ID/Passport No.', 'Nationality', 'Email', 'Contact Number', 'Organization', 'Category', 'Residential Address', 'Postal Address', 'Approved Date']);
            foreach ($members as $m) {
                fputcsv($handle, [
                    $m->membership_number,
                    $m->name,
                    $m->surname,
                    $m->identification_number,
                    $m->nationality,
                    $m->email,
                    $m->phone,
                    $m->organization,
                    $m->category,
                    $m->residential_address,
                    $m->postal_address,
                    $m->approved_at?->format('Y-m-d'),
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }
}

