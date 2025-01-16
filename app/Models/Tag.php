<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
