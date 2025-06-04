<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        protected $fillable = [
        'title',
        'description',
        'slug',
        'image',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
