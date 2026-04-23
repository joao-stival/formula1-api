<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favoreites extends Model
{
    protected $fillable = [
        'user_id',
        'team_id',
        'race_id',
     ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Teams::class);
    }

    public function race()
    {
        return $this->belongsTo(Races::class);
    }
}