<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Picture;
use App\Http\Requests;

class PictureController extends Controller
{
    /**
     * Display a list of all Pictures.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
         return view('pictures.index', [
            'pictures' => Picture::orderBy('name')->get(),
        ]);
    }
}
