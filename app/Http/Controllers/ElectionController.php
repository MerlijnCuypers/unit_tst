<?php namespace App\Http\Controllers;

use App\Election;
use App\Matchmaker;
use App\Picture;
use Illuminate\Http\Request;
use App\Http\Requests;

class ElectionController extends Controller
{

    /**
     * 
     * @return Response
     */
    public function index()
    {
        return view('election.index', [
            'election' => $this->electionRepository->getSetup(),
        ]);
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'wonPicId' => 'required|integer',
            'lostPicId' => 'required|integer',
        ]);
        // find or pictures with id exist
        $wonPic = Picture::findOrFail($request->wonPicId);
        $lostPic = Picture::findOrFail($request->lostPicId);
        
        $election = new Election;
        $election->winning_picture_id = $wonPic->id;
        $election->losing_picture_id = $lostPic->id;
        $election->save();
        
        $this->matchmakerRepository->electMatch($wonPic->id, $lostPic->id);

        return view('election.pictures', [
            'election' => $this->electionRepository->getSetup(),
        ]);
    }
}
