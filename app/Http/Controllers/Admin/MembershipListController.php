<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MembershipListController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->get('search');
        $category = $request->get('category');

        $query = Member::where('status', 'approved')->orderBy('membership_number');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name',                  'like', "%{$search}%")
                  ->orWhere('surname',              'like', "%{$search}%")
                  ->orWhere('email',                'like', "%{$search}%")
                  ->orWhere('membership_number',    'like', "%{$search}%")
                  ->orWhere('identification_number','like', "%{$search}%")
                  ->orWhere('organization',         'like', "%{$search}%");
            });
        }

        if ($category) {
            $query->where('category', $category);
        }

        $members = $query->paginate(50)->withQueryString();

        $categories = Member::where('status', 'approved')
                            ->distinct()
                            ->orderBy('category')
                            ->pluck('category');

        $total = Member::where('status', 'approved')->count();

        return view('admin.membershiplist.index', compact('members', 'search', 'category', 'categories', 'total'));
    }
}
