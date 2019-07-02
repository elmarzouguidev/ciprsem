<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
class PhotoController extends Controller
{
    //




    public function __construct()
    {
        $this->middleware('auth'); //==> 9bel mat5ali chi wa7ed idkhool l had page
        // chof be3da wach dkhel password+email dyalo
        // mni  Ydkhol chof wach users (auth:users)

    }

    public function all()
    {
        $profile = Profile::find(Auth::user()->id);

        $photos  = Photo::where('user_id',Auth::user()->id)
            ->where('user_name',Auth::user()->name)
            ->where('user_type','user')
            ->get();
        return view('profile.photos.index',compact('photos','profile'));
    }

    public function store(Request $request)
    {
        // validator
        $this->validate($request,[
            'title'=>'required|min:2',
            'thefile' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'category'=>'required'

        ]);

        $photo = new Photo();
        //$photo->user_name = Auth::user()->name;
        if($request->hasFile('thefile'))
        {
            $image = $request->file('thefile');

            $filename = time().'.img_'.Auth::user()->name.'.'. $image->getClientOriginalExtension();
            $location = public_path('profiles/images/'.$filename);
            //Image::make($image)->resize(1400,1200)->save($location);
            Image::make($image)->save($location);

            $photo->photo  = $filename;
        }
        $photo->title       = $request['title'];
        if($request['category']=='skoura')
        {
            $photo->category_id = 1;
        }
        if($request['category']=='ouarzazate')
        {
            $photo->category_id = 2;
        }
        $photo->category_name = $request['category'];
        $photo->user_id   = Auth::user()->id;
        $photo->user_name   = Auth::user()->name;
        $photo->user_type   = "user";

        $message ="there is was a error";
        if($request->user()->photos()->save($photo)){
            $message ="Your Photo successfully created !";
        }


        return redirect()->route('photo.all')->with(['message'=>$message]);
    }

    public function photo_delete($id)
    {
        $post = Photo::where('id',$id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        if(Auth::user()->name != $post->user->name){
            $message ="Errrr !";
            return redirect()->back()->with(['message'=>$message]);

           // return redirect()->route('profile')->with(['message'=>$message]);
        }
        if($post = Photo::where('id',$id)->first())
        {
            $filename = $post->photo;
            $fullPath = public_path().'/profiles/images/' . $filename;
            if(File::exists($fullPath)) File::delete($fullPath);
            $post->delete($id);

        }
        $message ="Your Photo successfully Deleted !";
        return redirect()->route('photo.all')->with(['message'=>$message]);


    }

}
