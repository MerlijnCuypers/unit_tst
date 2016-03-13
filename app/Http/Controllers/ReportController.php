<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    
    /**
     * Display a list of all Pictures.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
         return view('reports.index', [
             
        ]);
    }
}
