<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    protected $fillable = ['title', 'subtitle', 'image_path', 'video_path', 'location', 'sort_order', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    protected function resolvePublicMediaUrl(?string $path, string $fallback = 'assets/img/bg-img.jpeg'): string
    {
        if (! $path) {
            return asset($fallback);
        }

        if (str_starts_with($path, 'assets/') || str_starts_with($path, 'http')) {
            return asset($path);
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return asset($fallback);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getMediaUrlAttribute(): string
    {
        if ($this->video_path) {
            return $this->resolvePublicMediaUrl($this->video_path, 'assets/img/bg-img.jpeg');
        }

        return $this->resolvePublicMediaUrl($this->image_path, 'assets/img/bg-img.jpeg');
    }

    public function getImageUrlAttribute(): string
    {
        return $this->resolvePublicMediaUrl($this->image_path, 'assets/img/bg-img.jpeg');
    }

    public function getTypeAttribute(): string
    {
        return $this->video_path ? 'video' : 'image';
    }
}
