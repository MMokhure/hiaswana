<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'event_date',
        'location',
        'image',
        'status',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}
