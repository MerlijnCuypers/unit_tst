<?php namespace App\Repositories;

use App\Election;
use App\Picture;
use \DB;

class ElectionRepository extends Repository
{

    /**
     * make election based on match from matchmaker
     *
     * @return Election
     */
    public function getSetup()
    {
        $matchmaker = $this->matchmakerRepository->getMatch();
        $pictures = $matchmaker->shuffleImageIds();
        // make new election Obj
        $election = new Election;
        $election->picture1 = Picture::findOrFail($pictures[0]);
        $election->picture2 = Picture::findOrFail($pictures[1]);
        // set match as elected to get minimum of shows even with refresh
        $this->matchmakerRepository->electMatch($pictures[0], $pictures[1]);

        return $election;
    }

    /**
     * get winnings list of elections
     *
     * @return array results
     */
    public function getHotList()
    {
        $rawQuery = 'select count(winning_picture_id) wins, '
            . 'file, '
            . 'name, '
            . 'max(elections.created_at) last '
            . 'from elections '
            . 'inner join pictures on winning_picture_id = pictures.id '
            . 'group by winning_picture_id '
            . 'order by wins desc, last';

        return DB::select($rawQuery);
    }

    /**
     * get losses list of elections
     *
     * @return array results
     */
    public function getNotList()
    {
        $rawQuery = 'select count(losing_picture_id) losses, '
            . 'file, '
            . 'name, '
            . 'max(elections.created_at) last '
            . 'from elections '
            . 'inner join pictures on losing_picture_id = pictures.id '
            . 'group by losing_picture_id '
            . 'order by losses desc, last';

        return DB::select($rawQuery);
    }

    /**
     * get list of totale elections per pictuer
     *
     * @return array results
     */
    public function getTotalList()
    {
        $rawQuery = 'select count(elections.id) elected, '
            . 'file, '
            . 'name, '
            . 'max(elections.created_at) last '
            . 'from  pictures '
            . 'inner join elections on losing_picture_id = pictures.id or winning_picture_id = pictures.id '
            . 'group by pictures.id '
            . 'order by elected, last';

        return DB::select($rawQuery);
    }

    /**
     * get flow list of elections per pictuer
     *
     * @return array results
     */
    public function getFlowList()
    {
        $elections = Election::select('winning_picture_id', 'losing_picture_id', 'created_at')
            ->orderBy('created_at', 'asc')
            ->get();
        $flow = array();
        $userCount = array();
        foreach ($elections as $election) {
            if (!array_key_exists($election->winning_picture_id, $userCount)) {
                $userCount[$election->winning_picture_id] = 0;
                $pic = Picture::findOrFail($election->winning_picture_id);
                $flow[$election->winning_picture_id] = array('label' => $pic->name, 'data' => array());
            }

            if (!array_key_exists($election->losing_picture_id, $userCount)) {
                $userCount[$election->losing_picture_id] = 0;
                $pic = Picture::findOrFail($election->losing_picture_id);
                $flow[$election->losing_picture_id] = array('label' => $pic->name, 'data' => array());
            }

            $flow[$election->winning_picture_id]['data'][] = array(
                $election->created_at->getTimestamp(), ++$userCount[$election->winning_picture_id]
            );
            $flow[$election->losing_picture_id]['data'][] = array(
                $election->created_at->getTimestamp(), --$userCount[$election->losing_picture_id]
            );
        }
        return array_values($flow);
    }
}
