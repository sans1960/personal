<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable=['nom','lloc','motiu','dia','hora','comentari'];
}
