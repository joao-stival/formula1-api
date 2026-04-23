<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use App\Models\Races;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Races extends Model
{

    protected $fillable = [
        'name',
        'date',
     ];

}