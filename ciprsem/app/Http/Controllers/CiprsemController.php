<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CiprsemController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index()
    {

        $background = Setting::where('id',1)->first();
        return view('admin.settings.index',compact('background'));

    }
    public function store_index(Request $request)
    {

        $messages = [

            'thefile.required' => trans('admin.articles.select_img'),
            'thefile.image' => trans('admin.articles.select_img_ext'),
            'thefile.mimes' => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded' => trans('admin.articles.select_img_size'),
            'thefile.dimensions' => trans('admin.settings.errors.length'),
        ];
        $newBack = Setting::find(1);

        $validator = Validator::make(Input::all(),
            [

                'thefile' => 'required|image|
                   mimes:jpeg,png,jpg|max:2048|
                   dimensions:min_width=1270,min_height=565,max_width=1920,max_height=640',
            ],$messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'-ciprsem-'.date('Y-m-d') . '_home_background'.'.' . $image->getClientOriginalExtension();
            $location = public_path('ciprsem/background/' . $filename);
            $r_image = Image::make($image);
            /* $r_image-> resize(900, 900, function ($ration){
                 $ration->aspectRatio();
             });*/
            // $r_image->insert($location_copy,'bottom-right');
            $r_image->save($location);
            // Image::make($image)->save($location);

            $newBack->home_background = $filename;

        }
        if ($request->admin()->settings()->save($newBack)) {

            return response()->json(['success' => trans('admin.articles.add_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.add_is_ok')]);
    }

    public function delete_index($id)
    {
        $post = Setting::find($id);

        if ($post) {
            $filename = $post->home_background;
            $fullPath = public_path() . '/ciprsem/background/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->home_background = null;
            $post->update();

            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);

        }
        return redirect()->route('admin.article.all');
    }

    public function news()
    {
        $background = Setting::where('id',1)->first();
        return view('admin.settings.news',compact('background'));
    }

    public function news_store(Request $request)
    {

        $messages = [

            'thefile.required' => trans('admin.articles.select_img'),
            'thefile.image' => trans('admin.articles.select_img_ext'),
            'thefile.mimes' => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded' => trans('admin.articles.select_img_size'),
            'thefile.dimensions' => trans('admin.settings.errors.length'),
        ];
        $newBack = Setting::find(1);

        $validator = Validator::make(Input::all(),
            [

                'thefile' => 'required|image|
                   mimes:jpeg,png,jpg|max:2048|
                   dimensions:min_width=1270,min_height=565,max_width=1920,max_height=640',
            ],$messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'-ciprsem-'.date('Y-m-d') . '_news_background'.'.' . $image->getClientOriginalExtension();
            $location = public_path('ciprsem/background/' . $filename);
            $r_image = Image::make($image);
            /* $r_image-> resize(900, 900, function ($ration){
                 $ration->aspectRatio();
             });*/
            // $r_image->insert($location_copy,'bottom-right');
            $r_image->save($location);
            // Image::make($image)->save($location);

            $newBack->news_background = $filename;

        }
        if ($request->admin()->settings()->save($newBack)) {

            return response()->json(['success' => trans('admin.articles.add_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.add_is_ok')]);
    }

    public function delete_news($id)
    {
        $post = Setting::find($id);

        if ($post) {
            $filename = $post->news_background;
            $fullPath = public_path() . '/ciprsem/background/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->news_background = null;
            $post->update();

            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);

        }
        return redirect()->route('admin.article.all');
    }

    public function activities()
    {
        $background = Setting::where('id',1)->first();
        return view('admin.settings.activity',compact('background'));
    }

    public function activities_store(Request $request)
    {
        $messages = [

            'thefile.required' => trans('admin.articles.select_img'),
            'thefile.image' => trans('admin.articles.select_img_ext'),
            'thefile.mimes' => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded' => trans('admin.articles.select_img_size'),
            'thefile.dimensions' => trans('admin.settings.errors.length'),
        ];
        $newBack = Setting::find(1);

        $validator = Validator::make(Input::all(),
            [

                'thefile' => 'required|image|
                   mimes:jpeg,png,jpg|max:2048|
                   dimensions:min_width=1270,min_height=565,max_width=1920,max_height=640',
            ],$messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'-ciprsem-'.date('Y-m-d') . '_activities_background'.'.' . $image->getClientOriginalExtension();
            $location = public_path('ciprsem/background/' . $filename);
            $r_image = Image::make($image);
            /* $r_image-> resize(900, 900, function ($ration){
                 $ration->aspectRatio();
             });*/
            // $r_image->insert($location_copy,'bottom-right');
            $r_image->save($location);
            // Image::make($image)->save($location);

            $newBack->activities_background = $filename;

        }
        if ($request->admin()->settings()->save($newBack)) {

            return response()->json(['success' => trans('admin.articles.add_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.add_is_ok')]);
    }
    public function delete_activities($id)
    {
        $post = Setting::find($id);

        if ($post) {
            $filename = $post->activities_background;
            $fullPath = public_path() . '/ciprsem/background/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->activities_background = null;
            $post->update();

            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);

        }
        return redirect()->route('admin.article.all');
    }



    public function picturs()
    {
        $background = Setting::where('id',1)->first();
        return view('admin.settings.picturs',compact('background'));
    }

    public function picturs_store(Request $request)
    {
        $messages = [

            'thefile.required' => trans('admin.articles.select_img'),
            'thefile.image' => trans('admin.articles.select_img_ext'),
            'thefile.mimes' => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded' => trans('admin.articles.select_img_size'),
            'thefile.dimensions' => trans('admin.settings.errors.length'),
        ];
        $newBack = Setting::find(1);

        $validator = Validator::make(Input::all(),
            [

                'thefile' => 'required|image|
                   mimes:jpeg,png,jpg|max:2048|
                   dimensions:min_width=1270,min_height=565,max_width=1920,max_height=640',
            ],$messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'-ciprsem-'.date('Y-m-d') . '_picturs_background'.'.' . $image->getClientOriginalExtension();
            $location = public_path('ciprsem/background/' . $filename);
            $r_image = Image::make($image);
            /* $r_image-> resize(900, 900, function ($ration){
                 $ration->aspectRatio();
             });*/
            // $r_image->insert($location_copy,'bottom-right');
            $r_image->save($location);
            // Image::make($image)->save($location);

            $newBack->picturs_background = $filename;

        }
        if ($request->admin()->settings()->save($newBack)) {

            return response()->json(['success' => trans('admin.articles.add_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.add_is_ok')]);
    }

    public function delete_picturs($id)
    {
        $post = Setting::find($id);

        if ($post) {
            $filename = $post->picturs_background;
            $fullPath = public_path() . '/ciprsem/background/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->picturs_background = null;
            $post->update();

            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);

        }
        return redirect()->route('admin.article.all');
    }

    public function videos()
    {
        $background = Setting::where('id',1)->first();
        return view('admin.settings.videos',compact('background'));
    }
    public function videos_store(Request $request)
    {
        $messages = [

            'thefile.required' => trans('admin.articles.select_img'),
            'thefile.image' => trans('admin.articles.select_img_ext'),
            'thefile.mimes' => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded' => trans('admin.articles.select_img_size'),
            'thefile.dimensions' => trans('admin.settings.errors.length'),
        ];
        $newBack = Setting::find(1);

        $validator = Validator::make(Input::all(),
            [

                'thefile' => 'required|image|
                   mimes:jpeg,png,jpg|max:2048|
                   dimensions:min_width=1270,min_height=565,max_width=1920,max_height=640',
            ],$messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'-ciprsem-'.date('Y-m-d') . '_videos_background'.'.' . $image->getClientOriginalExtension();
            $location = public_path('ciprsem/background/' . $filename);
            $r_image = Image::make($image);
            /* $r_image-> resize(900, 900, function ($ration){
                 $ration->aspectRatio();
             });*/
            // $r_image->insert($location_copy,'bottom-right');
            $r_image->save($location);
            // Image::make($image)->save($location);

            $newBack->videos_background = $filename;

        }
        if ($request->admin()->settings()->save($newBack)) {

            return response()->json(['success' => trans('admin.articles.add_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.add_is_ok')]);
    }

    public function delete_videos($id)
    {
        $post = Setting::find($id);

        if ($post) {
            $filename = $post->videos_background;
            $fullPath = public_path() . '/ciprsem/background/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->videos_background = null;
            $post->update();

            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);
        }
        return redirect()->route('admin.article.all');
    }


    /******** system***************************************************/

    public function controller()
    {
        return view('admin.system.index');
    }

    public function On_Off()
    {
        Artisan::call('down');

            return response()->json(['success' =>['system_down'=>'Power OFF is done']]);

    }

}
