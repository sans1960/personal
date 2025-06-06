<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable= ['name','slug','image','latitud','longitud','zoom','body','caption'];


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
