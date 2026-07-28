<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'identification_number',
        'nationality',
        'residential_address',
        'postal_address',
        'email',
        'phone',
        'organization',
        'category',
        'status',
        'motivation',
        'membership_number',
        'approved_at',
        'notes',
        'payment_proof',
        'payment_status',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public static function generateMembershipNumber(): string
    {
        $year = now()->year;
        $last = static::whereYear('approved_at', $year)
                       ->whereNotNull('membership_number')
                       ->count();
        return 'HIAS-' . $year . '-' . str_pad($last + 1, 4, '0', STR_PAD_LEFT);
    }
}

