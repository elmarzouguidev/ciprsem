<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Intervention\Image\Facades\Image;

class ActivitiesController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

        $this->getCurrentLocale();


    }
    public function getCurrentLocale()
    {

        return LaravelLocalization::getCurrentLocale();
    }

    public function create()
    {
        $loc =$this->getCurrentLocale();
        $profile = Profile::find(Auth::user()->id);
        return view('profile.activity.create',compact('profile','loc'));

    }


    public function store(Request $request)
    {
        // validator
        $this->validate($request,[
            'body'=>'required',
            'title'=>'required|max:255',
            'linke'=>'required|max:255',
            'thefile' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $loc =$this->getCurrentLocale();

        $activity = new Activity();

        switch ($loc)
        {
            case 'fr':
                $activity->title_fr = $request['title'];
                $activity->body_fr = $request['body'];
                $activity->translated  = 'fr';
                $activity->video  = $request['linke'];
                break;

            case 'en':
                $activity->title_en = $request['title'];
                $activity->body_en  = $request['body'];
                $activity->translated  = 'en';
                $activity->video    = $request['linke'];
                break;

            case 'ar':
                $activity->title_ar = $request['title'];
                $activity->body_ar  = $request['body'];
                $activity->translated  = 'ar';
                $activity->video    = $request['linke'];
                break;

        }

        if($request->hasFile('thefile'))
        {
            $image = $request->file('thefile');

            $filename = time().'_activity_'.Auth::user()->name.'.'. $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/'.$filename);
            //Image::make($image)->resize(1400,1200)->save($location);
            Image::make($image)->save($location);
            $activity->pic  = $filename;
        }

        $activity->user_name = Auth::user()->name;
        $message ="there is was a error";
        if($request->user()->activities()->save($activity)){
            $message ="Your Activity successfully created !";
        }


        return redirect()->route('profile')->with(['message'=>$message]);
    }

}
