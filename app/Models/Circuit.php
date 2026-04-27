<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    protected $fillable = [
        'name',
        'country',
        'city',
        'length_km',
    ];
}
