<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name','url','slug','logo','notes'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
