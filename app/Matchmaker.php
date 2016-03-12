<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchmaker extends Model
{

    protected $picture1;
    protected $picture2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'picture1_id', 'picture2_id',
    ];
    /**
     * 
     * @return array
     */
    public function shuffleImageIds()
    {
        $pictures = array($this->picture1_id, $this->picture2_id);
        shuffle($pictures);
        return $pictures;
    }


}
