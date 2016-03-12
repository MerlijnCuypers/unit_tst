<?php namespace App\Repositories;
 
use App\Election;
use App\Picture;

class ElectionRepository extends Repository
{

    public function getSetup()
    {
        $matchmaker = $this->matchmakerRepository->getMatch();
        $pictures = $matchmaker->shuffleImageIds();
        // make new election Obj
        $election = new Election;
        $election->picture1 = Picture::findOrFail($pictures[0]);
        $election->picture2 = Picture::findOrFail($pictures[1]);
            
        return $election;
    }

}