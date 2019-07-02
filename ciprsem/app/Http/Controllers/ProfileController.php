<?php

namespace App\Http\Controllers;

use App\Category;
use App\Profile;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); //==> 9bel mat5ali chi wa7ed idkhool l had page
        // chof be3da wach dkhel password+email dyalo
        // mni  Ydkhol chof wach users (auth:users)
        $this->getCurrentLocale();


    }

    public function getCurrentLocale()
    {
        return LaravelLocalization::getCurrentLocale();
    }

    public function index()
    {
        $loc =$this->getCurrentLocale();


        //$articles_shod = Article::where('translated','fr')->where('user_id',Auth::user()->id)->get();
        $articles_shod = Article::where('user_id',Auth::user()->id)

            ->Where(function ($query) {
                $query->where('user_name',Auth::user()->name)

                    ->whereNull('title_fr')
                    ->whereNull('body_fr')

                    ->whereNull('title_en')
                    ->whereNull('body_en')

                    ->whereNull('title_ar')
                    ->whereNull('body_ar')


                    ->OrwhereNull('title_fr')
                    ->OrwhereNull('body_fr')

                    ->OrwhereNull('title_en')
                    ->OrwhereNull('body_en')

                    ->OrwhereNull('title_ar')
                    ->OrwhereNull('body_ar');

                    })
            ->get();

        $profile = Profile::where('user_id',Auth::user()->id)->first();// Jbed lia les info dyal User :D

        $categories =Category::all();


        return view('profile.home.index',compact('articles_shod','loc','profile','categories'));
    }

    public function myinfo_store(Request $request)
    {
        // validator

        $this->validate($request,[
            'email'=>'required',
            'facebook'=>'required',
            'address'=>'required|min:3',
            'phone'=>'required|digits:10'


        ]);
        $user = Profile::where('user_id',Auth::user()->id)->first();
        if($user)
        {
            $user->gmail        = $request['email'];
            $user->facebook     = $request['facebook'];
            $user->address      = $request['address'];
            $user->number_phone = $request['phone'];
        }


        $message ="there is was a error";
        if($request->user()->profile()->save($user)){
            $message ="Your post successfully created !";
        }
        return redirect()->route('personel.about',Auth::user()->name)->with(['message' => $message]);
    }

    public function myinfo()
    {
        $profile = Profile::find(Auth::user()->id);
        return view('profile.personel.index',compact('profile'));
    }

    public function myinfo_about()
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
       // $profile = Profile::find(Auth::user()->id);
        $loc =$this->getCurrentLocale();
        return view('profile.personel.about',compact('loc','profile'));
    }

    public function myinfo_about_store(Request $request)
    {
        // validator
        $this->validate($request, [
            'fullname' => 'required',
            'fullabout' => 'required'

        ]);

        $userprofile = Profile::where('user_id',Auth::user()->id)->first();
        if ($userprofile)
        {


            $loc = $this->getCurrentLocale();
            switch ($loc) {
                case 'fr':
                    $userprofile->fullname = $request['fullname'];
                    $userprofile->about_fr = $request['fullabout'];

                    break;

                case 'en':
                    $userprofile->fullname = $request['fullname'];
                    $userprofile->about_en = $request['fullabout'];

                    break;
                case 'ar':
                    $userprofile->fullname = $request['fullname'];
                    $userprofile->about_ar = $request['fullabout'];

                    break;
            }

            $userprofile->user_name = Auth::user()->name;
            $message ="there is was a error";
            if($request->user()->profiles()->save($userprofile)){
                $message ="Your post successfully created !";
            }
            return redirect()->route('personel.about',Auth::user()->name)->with(['message' => $message]);
        }
        else
        {
            $userprofile = new Profile();
            $loc = $this->getCurrentLocale();
            switch ($loc) {
                case 'fr':
                    $userprofile->fullname = $request['fullname'];
                    $userprofile->about_fr = $request['fullabout'];

                    break;

                case 'en':
                    $userprofile->fullname = $request['fullname'];
                    $userprofile->about_en = $request['fullabout'];

                    break;
                case 'ar':
                    $userprofile->fullname = $request['fullname'];
                    $userprofile->about_ar = $request['fullabout'];

                    break;
            }
            $userprofile->user_id = Auth::user()->id;
            $userprofile->user_name = Auth::user()->name;
            $message ="there is was a error";
            if($request->user()->profiles()->save($userprofile)){
                $message ="Your post successfully created !";
            }
            return redirect()->route('personel.about',Auth::user()->name)->with(['message' => $message]);
        }
    }


    public function myinfo_about_store_photo(Request $request)
    {
        // validator
        $this->validate($request,[
            'thefile'=>'required',


        ]);
        /*$oldimg = Profile::find(Auth::user()->id);
        $filename = $oldimg->photo;

        $fullPath = public_path().'images/profile/abdelghafour/' . $filename;
        if(File::exists($fullPath)) File::delete($fullPath);
        //$oldimg->delete(Auth::user()->id);*/
        $img = Profile::where('user_id',Auth::user()->id)->first();

        if ($img) {

            if ($request->hasFile('thefile')) {
                $image = $request->file('thefile');

                $filename = time() . '.' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
                $location = public_path('profiles/abdo/img/' . $filename);
                Image::make($image)->save($location);

                $img->photo      = $filename;

               // File::delete($location);
            }
        }

        $message ="there is was a error";
        if($request->user()->profiles()->save($img)){
            $message ="Your post successfully created !";
        }
        return redirect()->route('personel.about',Auth::user()->name)->with(['message' => $message]);
    }

    public function myinfo_about_store_photo_ground(Request $request)
    {
        // validator
        $this->validate($request,[
            'thefile'=>'required',


        ]);
        $img = Profile::where('user_id',Auth::user()->id)->first();

        if ($img) {

            if ($request->hasFile('thefile')) {
                $image = $request->file('thefile');

                $filename = time() . 'background_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
                $location = public_path('profiles/abdo/img/' . $filename);
                Image::make($image)->save($location);
                $oldimg = public_path('profiles/abdo/img/' . $img->background);
                $img->background = $filename;
                File::delete($oldimg);
            }
        }

        $message ="there is was a error";
        if($request->user()->profiles()->save($img)){
            $message ="Your post successfully created !";
        }
        return redirect()->route('personel.about',Auth::user()->name)->with(['message' => $message]);
    }



}
