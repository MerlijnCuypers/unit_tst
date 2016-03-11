<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchmaker extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'picture1_id', 'picture2_id',
    ];
}
