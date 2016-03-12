<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $picture1;
    protected $picture2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'winning_picture_id', 'losing_picture_id', 'created_at',
    ];

}
