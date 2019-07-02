<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth'); //==> 9bel mat5ali chi wa7ed idkhool l had page
        // chof be3da wach dkhel password+email dyalo
        // mni  Ydkhol chof wach users (auth:users)



    }


    public function store(Request $request)
    {
        // validator
        $this->validate($request,[
            'body'=>'required|min:1',
            'title'=>'required|min:2',
            'linke'=>'required|min:1'

        ]);

        $video = new Video();
        $video->user_name = Auth::user()->name;
        $video->profile_id = Auth::user()->id;
        $video->title = $request['title'];
        $video->linke = $request['linke'];
        $video->desc = $request['body'];

        $message ="there is was a error";
        if($request->user()->videos()->save($video)){
            $message ="Your video successfully created !";
        }


        return redirect()->route('profile')->with(['message'=>$message]);
    }
}
