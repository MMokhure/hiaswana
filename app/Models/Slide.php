<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    protected $fillable = ['title', 'subtitle', 'image_path', 'location', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path) return asset('assets/img/bg-img.jpeg');
        if (str_starts_with($this->image_path, 'assets/') || str_starts_with($this->image_path, 'http')) {
            return asset($this->image_path);
        }
        return Storage::url($this->image_path);
    }
}
