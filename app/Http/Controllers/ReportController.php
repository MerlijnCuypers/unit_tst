<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\Picture;
use App\Http\Requests;

class ReportController extends Controller
{

    /**
     * Display a list of all Pictures.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        return view('reports.index', [
            'reportHot' => $this->electionRepository->getHotList(),
            'reportNot' => $this->electionRepository->getNotList()
        ]);
    }

    public function totalReport()
    {
        $reportTotals = $this->electionRepository->getTotalList();
        $reply = [['name', 'election']];
        foreach ($reportTotals as $picture) {
            $reply[] = [$picture->name, (int) $picture->elected];
        }
        return $reply;
    }

    public function flowReport()
    {
        return $this->electionRepository->getFlowList();
    }
}
