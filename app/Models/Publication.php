<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'author',
        'year',
        'type',
        'file_url',
        'status',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
