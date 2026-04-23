<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaceDrivers extends Model
{
    protected $fillable = [
        'race_id',
        'driver_id',
     ];
}