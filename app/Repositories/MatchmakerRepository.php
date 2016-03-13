<?php namespace App\Repositories;

use App\Matchmaker;
use App\Election;
use App\Picture;
use \DB;

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
        // empty matchmaker table
        Matchmaker::truncate();
        // use raw query for performance reason
        $pictureIdList = DB::select('select id from pictures');
        //save unique matches in DB
        // no need to shuffle as getMatch() has random function
        $max = count($pictureIdList);
        $insterList = array();
        for ($i = 0; $i < $max; $i++) {
            for ($x = $i + 1; $x < $max; $x++) {
                $insterList[] = array(
                    'picture1_id' => $pictureIdList[$i]->id,
                    'picture2_id' => $pictureIdList[$x]->id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            }
        }
        // use bulk insert for performance reason
        DB::table('matchmakers')->insert($insterList);
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
