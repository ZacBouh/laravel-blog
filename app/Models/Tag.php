<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return Storage::url('defaults/tag_image.webp');
    }
}
