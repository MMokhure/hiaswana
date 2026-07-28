<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class CommitteeMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'committee_id',
        'name',
        'role',
        'email',
        'phone',
        'organization',
        'bio',
        'photo',
        'sort_order',
    ];

    public function committee(): BelongsTo
    {
        return $this->belongsTo(Committee::class);
    }

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? Storage::url($this->photo)
            : asset('assets/img/team-default.webp');
    }
}
