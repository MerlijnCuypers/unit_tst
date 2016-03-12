<?php namespace App\Repositories;

use App\Matchmaker;
use App\Election;
use App\Picture;

class MatchmakerRepository extends Repository
{

    public function getMatch()
    {
        $matchCollection = $this->_getNotElectedMatch();
        if ($matchCollection->count()) {
            return $matchCollection->random();
        }
        $this->makeNewRandomList();
        return $this->_getNotElectedMatch()->random();
    }

    /**
     * 
     * @return collection
     */
    private function _getNotElectedMatch()
    {
        return Matchmaker::where('elected', false)
                ->get();
    }

    /**
     * get all pictureIds and make random match list
     */
    public function makeNewRandomList()
    {
        // get picture ids
        $pictureIdList = Picture::select('id')
            ->get('id');
        $idList = array();
        foreach ($pictureIdList as $picture) {
            $idList[] = $picture->id;
        }
        //make list of unique matches of ids
        $matchList = array();
        $max = $pictureIdList->count();
        for ($i = 0; $i < $max; $i++) {
            for ($x = $i + 1; $x < $max; $x++) {
                $matchList[] = $idList[$i] . '_' . $idList[$x];
            }
        }
        // randomise list
        shuffle($matchList);

        // empty matchmaker table
        Matchmaker::truncate();

        // dump random list into DB        
        foreach ($matchList as $match) {
            $pictures = explode('_', $match);
            $match = new Matchmaker();
            $match->picture1_id = $pictures[0];
            $match->picture2_id = $pictures[1];
            $match->save();
        }
    }

    /**
     * update match as elected
     * 
     * @param type $pic1Id
     * @param type $pic2Id
     */
    public function electMatch($pic1Id, $pic2Id)
    {
        // sort id for faster query
        $lowId = ($pic1Id < $pic2Id) ? $pic1Id : $pic2Id;
        $HighId = ($pic1Id > $pic2Id) ? $pic1Id : $pic2Id;

        Matchmaker::where('elected', false)
            ->where('picture1_id', $lowId)
            ->where('picture2_id', $HighId)
            ->update(['elected' => 1]);
    }
}
