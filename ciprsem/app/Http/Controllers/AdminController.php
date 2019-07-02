<?php

namespace App\Http\Controllers;
use App\About;
use App\Admin;
use App\Profile;
use App\Role;
use App\Category;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use App\Article;
use App\Comment;
use App\Activity;
use App\Video;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Cocur\Slugify\Slugify;



/**
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

        parent::__construct();
    }

    /**
     * @return mixed
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Articles   = Article::all()->count();
        $photos     = Photo::all()->count();
        $videos     = Video::all()->count();

        return view('admin.home.index',compact('Articles',
            'photos','videos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create_article()
    {
        return view('admin.article.create');
    }

    /**
     * @param $str
     * @return bool
     *
     * check if the string is a arabic or no
     */
    private function is_arabic($str)
    {
        if (mb_detect_encoding($str) == 'UTF-8') {
            return true;
        }
        return false;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store_article(Request $request)
    {
        $messages = [
            'trans_lng.required' => trans('admin.articles.save_lng'),
            'trans_lng.integer'  => trans('admin.articles.save_lng'),
            'thefile.required'   => trans('admin.articles.select_img'),
            'thefile.image'      => trans('admin.articles.select_img_ext'),
            'thefile.mimes'      => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded'   => trans('admin.articles.select_img_size'),
        ];
        $validator = Validator::make(Input::all(),
            [
                'trans_lng' => 'integer|required',
                'body' => 'required|min:20',
                'title' => 'required|min:5',
                //'cats' => 'required|integer',
                'thefile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                /* 'thefile' => 'required|image|
                  mimes:jpeg,png,jpg|max:2048|
                  dimensions:max_width=500,max_height=500',*/

            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $arabic = $this->is_arabic($request['title']);
        $lng = $request['trans_lng'];
        $article = new Article();
        $slug    = new Slugify();
        //$slug->slugify($request['title']);
        switch ($lng) {
            case 1://ARABIC
                $article->title_ar = $request['title'];
                $article->body_ar = $request['body'];
                $article->translated = 'to_ar';
                // $article->slug = $slug->slugify($request['slug']);
                $article->user_type = "admin";
                break;

            case 2://FRENCH
                if ($arabic) {
                    return response()->json(['errors' => ['arabic_str' => trans('admin.errors.errors_str')]]);

                } else {
                    $article->title_fr = $request['title'];
                    $article->body_fr = $request['body'];
                    $article->slug = $slug->slugify($request['title']);
                    $article->user_type = "admin";
                }

                break;

            case 3://ENGLISH
                if ($arabic) {
                    return response()->json(['errors' => ['arabic_str' => trans('admin.errors.errors_str')]]);

                } else {
                    $article->title_en = $request['title'];
                    $article->body_en = $request['body'];
                    // $article->slug = $slug->slugify($request['title']);
                    $article->user_type = "admin";
                }

                break;

        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time() . '_ciprsem_article_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            // $location_copy = public_path('c_images/articles/logo.png');
            $r_image = Image::make($image);
            $r_image-> resize(800, 550);
            /* $r_image-> resize(900, 900, function ($ration){
                 $ration->aspectRatio();
             });*/
            // $r_image->insert($location_copy,'bottom-right');
            $r_image->save($location);
            // Image::make($image)->save($location);
            $article->pic = $filename;
        }
        $article->active = false;
        $article->user_name = Auth::user()->name;

        if ($request->admin()->articles()->save($article)) {

            return response()->json(['success' => trans('admin.articles.add_is_ok')]);
        }

        return response()->json(['errors' => trans('admin.articles.delete_is_no')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all_article()
    {

        $articles = Article::ArticleTranslatedInAllLanguages();

        return view('admin.article.index', compact('articles'));
    }
    public function enable($id)
    {

        $article = Article::find($id);

        if($article)
        {
            switch ($article->active)
            {
                case true :
                    $article->active = false;

                    $article->update();
                    return response()->json(['success' => ['disable'=>true]]);

                    break;
                case false :
                    $article->active = true;

                    $article->update();
                    return response()->json(['success' => ['active'=>true]]);

                    break;
                default;
            }
        }
        return response()->json(['errors' =>'somthing wont wrong']);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activities_enable($id)
    {
        $articles = Activity::find($id);
        $articles->active=true;
        $articles->update();
        return redirect()->back();
    }

    public function activities_disable($id)
    {

        $articles = Activity::find($id);
        $articles->active=false;
        $articles->update();
        return redirect()->back();
    }


    public function edit_article($id)
    {

        $articles_edit = Article::find($id);
        return view('admin.article.edit', compact('articles_edit'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function save_edit_article(Request $request, $id)
    {

        $validator = Validator::make(Input::all(),
            [
                'body' => 'required',
                'title' => 'required|min:5|max:255',
                // 'cats' => 'required|integer',
                'thefile' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                /* 'thefile' => 'required|image|
                  mimes:jpeg,png,jpg|max:2048|
                  dimensions:max_width=500,max_height=500',*/


            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $articles_o = Article::find($id);
        $loc = $this->getCurrentLocale();
        switch ($loc) {
            case 'fr':
                $articles_o->title_fr = $request['title'];
                $articles_o->body_fr = $request['body'];

                break;

            case 'en':
                $articles_o->title_en = $request['title'];
                $articles_o->body_en = $request['body'];

                break;
            case 'ar':
                $articles_o->title_ar = $request['title'];
                $articles_o->body_ar = $request['body'];

                break;
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '_ciprsem_article_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            // Image::make($image)->save($location);
            Image::make($image)->resize(800, 550)->save($location);
            $oldimg = public_path('c_images/articles/' . $articles_o->pic);
            $articles_o->pic = $filename;
            File::delete($oldimg);
        }

        if ($articles_o->update()) {
            return response()->json(['success' => trans('admin.articles.update_is_ok')]);
        }
        return redirect()->route('admin.article.all')->with(['message' => 'Good']);

    }

    public function trans_article()
    {

        $articles = Article::ArticleNeedTrans();

        return view('admin.article.trans', compact('articles'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trans_article_single($id)
    {


        $articles_edit = Article::where('id', $id)->first();
        // var_dump($articles_edit->id);

        $fr = Article::where('id', $articles_edit->id)
            ->where('title_fr', null)
            ->where('body_fr', null)
            ->first();
        $en = Article::where('id', $articles_edit->id)
            ->where('title_en', null)
            ->where('body_en', null)
            ->first();
        $ar = Article::where('id', $articles_edit->id)
            ->where('title_ar', null)
            ->where('body_ar', null)
            ->first();
        return view('admin.article.trans_edit', compact('articles_edit', 'fr', 'en', 'ar'));
    }

    public function save_trans_article(Request $request, $id)
    {
        $messages = [
            'trans_lng.required' => trans('admin.articles.trans_lng'),

        ];
        $validator = Validator::make(Input::all(),
            [
                'trans_lng' => 'required|integer|max:4',
                'title' => 'required|min:3|max:255',
                'body' => 'required|min:20',
            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $slug = new Slugify();
        $articles_o = Article::find($id);
        $lng_trans = $request['trans_lng'];
        switch ($lng_trans) {
            case 1:
                $articles_o->title_ar = $request['title'];
                $articles_o->body_ar = $request['body'];

                break;

            case 2:
                $articles_o->title_fr = $request['title'];
                $articles_o->body_fr = $request['body'];

                $articles_o->slug = $slug->slugify($request['title']);
                break;
            case 3:
                $articles_o->title_en = $request['title'];
                $articles_o->body_en = $request['body'];

                break;
        }
        if ($articles_o->update()) {
            return response()->json(['success' => trans('admin.articles.trans_is_ok')]);
        }

        return redirect()->route('admin.article.all')
            ->with(['message' => trans('admin.articles.trans_is_ok')]);

    }

    public function all_article_comments($slug)
    {

        $singles = Article::CommentsForThisArticle($slug);

        return view('admin.article.comments', compact('singles'));

    }

    public function enable_comments($id)
    {
        $comment = Comment::find($id);

        if($comment)
        {
            switch ($comment->active)
            {
                case true :
                    $comment->active = false;

                    $comment->update();
                    return response()->json(['success' => ['disable'=>true]]);

                    break;
                case false :
                    $comment->active = true;

                    $comment->update();
                    return response()->json(['success' => ['active'=>true]]);

                    break;
                default;
            }
        }
        return response()->json(['errors' =>'somthing wont wrong']);
    }

    public function delete_article($id)
    {
        $post = Article::find($id);

        $comm = Comment::where('article_id', $id)
            ->first();
        /*if(Auth::user() != $post->user){
            return redirect()->back();
        }*/
        if ($post) {
            $filename = $post->pic;
            $fullPath = public_path() . '/c_images/articles/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->delete($post->id);
            if ($comm) {
                $comm->delete($comm->id);
            }
            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);

        }
        return redirect()->route('admin.article.all');
    }

    /** Les Activities***************************************************** */

    public function create_activities()
    {

        return view('admin.activity.create');
    }

    public function store_activities(Request $request)
    {
        // validator
        $messages = [
            'trans_lng.required' => trans('admin.articles.save_lng'),
            'trans_lng.integer' => trans('admin.articles.save_lng'),
            'thefile.required' => trans('admin.articles.select_img'),
            'thefile.image' => trans('admin.articles.select_img_ext'),
            'thefile.mimes' => trans('admin.articles.select_img_ext_type'),
            'thefile.uploaded' => trans('admin.articles.select_img_size'),

        ];
        $validator = Validator::make(Input::all(),
            [

                'trans_lng' => 'required|integer',
                'title' => 'required|max:255',
                'body' => 'required',
                'date' => 'required',
                'linke' => 'nullable|max:255',
                'thefile' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $slug = new Slugify(['rulesets' => ['default', 'arabic']]);
        $arabic = $this->is_arabic($request['title']);
        $lng = $request['trans_lng'];

        $activity = new Activity();

        switch ($lng) {
            case 1:
                $activity->title_ar = $request['title'];
                $activity->body_ar = $request['body'];
                $activity->translated = 'to_ar';
                $activity->video = $request['linke'];
                $activity->date = $request['date'];
                break;
            case 2:
                if ($arabic) {
                    return response()->json(['errors' => ['arabic_str' => trans('admin.errors.errors_str')]]);

                } else {
                    $activity->title_fr = $request['title'];
                    $activity->body_fr = $request['body'];
                    $activity->slug = $slug->slugify($request['title']);
                    $activity->translated = 'to_fr';
                    $activity->video = $request['linke'];
                    $activity->date = $request['date'];
                }
                break;
            case 3:
                if ($arabic) {
                    return response()->json(['errors' => ['arabic_str' => trans('admin.errors.errors_str')]]);

                } else {
                    $activity->title_en = $request['title'];
                    $activity->body_en = $request['body'];

                    $activity->translated = 'to_en';
                    $activity->video = $request['linke'];
                    $activity->date = $request['date'];
                }
                break;
        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '_ciprsem_activity_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            Image::make($image)->resize(800, 550)->save($location);
            // Image::make($image)->save($location);
            $activity->pic = $filename;
        }

        $activity->user_name = Auth::user()->name;
        $activity->user_type = "admin";
        if ($request->user()->activities()->save($activity)) {
            return response()->json(['success' => trans('admin.articles.store_activities')]);

        }
        return response()->json(['errors' => trans('admin.articles.delete_is_no')]);

    }

    public function all_activities()
    {

        $articles = Activity::all();

        return view('admin.activity.index', compact('articles'));
    }

    public function edit_activities($id)
    {

        $articles_edit = Activity::find($id);
        return view('admin.activity.edit', compact('articles_edit'));
    }

    public function save_edit_activities(Request $request, $id)
    {

        $validator = Validator::make(Input::all(),
            [
                'body' => 'required',
                'title' => 'required|max:255',
                'date' => 'required|date',
                'linke' => 'nullable|max:255',
                'thefile' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $articles_o = Activity::find($id);
        $loc = $this->getCurrentLocale();
        switch ($loc) {
            case 'fr':
                $articles_o->title_fr = $request['title'];
                $articles_o->body_fr = $request['body'];
                $articles_o->video = $request['linke'];
                $articles_o->translated = "en";
                break;

            case 'en':
                $articles_o->title_en = $request['title'];
                $articles_o->body_en = $request['body'];
                $articles_o->video = $request['linke'];
                $articles_o->translated = "ar";
                break;
            case 'ar':
                $articles_o->title_ar = $request['title'];
                $articles_o->body_ar = $request['body'];
                $articles_o->video = $request['linke'];
                $articles_o->translated = "ok";
                break;
        }
        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '_ciprsem_activity_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            Image::make($image)->resize(800, 550)->save($location);
            $oldimg = public_path('c_images/' . $articles_o->pic);
            $articles_o->pic = $filename;
            File::delete($oldimg);
        }
        //$articles_o->body_en = $request['body'];
        // $articles_o->translated = "en";
        if ($articles_o->update()) {
            return response()->json(['success' => trans('admin.articles.update_is_ok')]);
        }

        return redirect()->route('admin.activities.all')->with(['message' => 'Good']);
    }
    public function trans_activities()
    {
        $articles = Activity::whereNull('title_fr')
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
            ->OrwhereNull('body_ar')
            ->get();

        return view('admin.activity.trans', compact('articles'));
    }

    public function trans_activities_single($id)
    {


        $articles_edit = Activity::where('id', $id)->first();

        $fr = Activity::where('id', $id)
            ->where('title_fr', null)
            ->where('body_fr', null)
            ->first();
        $en = Activity::where('id', $id)
            ->where('title_en', null)
            ->where('body_en', null)
            ->first();
        $ar = Activity::where('id', $id)
            ->where('title_ar', null)
            ->where('body_ar', null)
            ->first();
        return view('admin.activity.trans_edit', compact('articles_edit', 'fr', 'en', 'ar'));
    }

    public function save_trans_activities(Request $request, $id)
    {
        $messages = [
            'trans_lng.required' => trans('admin.articles.trans_lng'),

        ];
        $validator = Validator::make(Input::all(),
            [
                'trans_lng' => 'required|integer|max:4',
                'title' => 'required|min:3|max:255',
                'body' => 'required|min:20',
            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $slug = new Slugify();
        $articles_o = Activity::find($id);
        $lng_trans = $request['trans_lng'];
        switch ($lng_trans) {
            case 1:
                $articles_o->title_ar = $request['title'];
                $articles_o->body_ar = $request['body'];
                $articles_o->translated = "to_ar";
                break;

            case 2:
                $articles_o->title_fr = $request['title'];
                $articles_o->body_fr = $request['body'];
                $articles_o->translated = "to_fr";
                $articles_o->slug = $slug->slugify($request['title']);
                break;
            case 3:
                $articles_o->title_en = $request['title'];
                $articles_o->body_en = $request['body'];
                $articles_o->translated = "to_en";
                //$articles_o->slug = $slug->slugify($request['title']);
                break;
        }
        if ($articles_o->update()) {
            return response()->json(['success' => trans('admin.articles.trans_is_ok')]);
        }

        return redirect()->route('admin.article.all')
            ->with(['message' => trans('admin.articles.trans_is_ok')]);

    }


    public function delete_activities($id)
    {
        $post = Activity::find($id);

        if ($post) {
            $fullPath = public_path() . '/c_images/articles/' . $post->pic;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->delete($post->id);
            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.delete_is_no')]);
    }


    public function create_videos()
    {

        return view('admin.video.create');
    }

    public function store_videos(Request $request)
    {
        // validator
        $messages = [
            'linke.required' => trans('admin.videos.linke_video'),
            'linke.unique' => trans('admin.videos.unique_video'),
        ];
        $validator = Validator::make(Input::all(),
            [
                // 'body'=>'required|min:1',
                'title' => 'required|min:2',
                'linke' => 'required|url|unique:videos',
                'thefile' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $video = new Video();
        //$video->user_name = Auth::user()->name;

        $video->title = $request['title'];
        $video->linke = $request['linke'];
        //  $video->desc  = $request['body'];
        $video->user_type = "admin";
        $video->user_name = Auth::user()->name;
        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '_ciprsem_video_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            Image::make($image)->resize(800, 530)->save($location);
            //Image::make($image)->save($location);
            $video->img = $filename;
        }


        if ($request->user()->videos()->save($video)) {
            return response()->json(['success' => trans('admin.videos.is_ok_video')]);
        }


        return redirect()->route('admin.videos.all')->with(['message' => "err"]);
    }

    public function all_videos()
    {

        $articles = Video::VideoByAdmin();

        return view('admin.video.index', compact('articles'));
    }


    public function edit_videos($id)
    {

        $articles_edit = Video::find($id);
        return view('admin.video.edit', compact('articles_edit'));
    }

    public function save_edit_videos(Request $request, $id)
    {
        $messages = [
            'linke.required' => trans('admin.videos.linke_video'),

        ];
        $validator = Validator::make(Input::all(),
            [
                // 'body'=>'required|min:1',
                'title' => 'required|min:2',
                'linke' => 'required|url',
                'thefile' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $articles_o = Video::find($id);
        //$loc =$this->getCurrentLocale();

        $articles_o->title = $request['title'];
        // $articles_o->desc = $request['body'];
        $articles_o->linke = $request['linke'];
        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '_ciprsem_video_' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            // Image::make($image)->save($location);
            Image::make($image)->resize(800, 530)->save($location);
            $oldimg = public_path('c_images/' . $articles_o->pic);
            $articles_o->pic = $filename;
            File::delete($oldimg);
        }

        if ($articles_o->update()) {
            return response()->json(['success' => trans('admin.articles.update_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.delete_is_no')]);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_videos($id)
    {
        $post = Video::find($id);

        if ($post) {
            $filename = $post->img;
            $fullPath = public_path() . '/c_images/articles/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);
            $post->delete($post->id);
            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);
        }
        return response()->json(['errors' => trans('admin.articles.delete_is_no')]);
    }

    public function store_photos(Request $request)
    {
        // validator
        $messages = [
            'thefile.max' => trans('admin.errors.errors_photo_max'),
        ];
        $this->validate($request, [
            'title' => 'required|min:2',
            'thefile' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'category' => 'required'

        ],$messages);

        $photo = new Photo();
        //$photo->user_name = Auth::user()->name;
        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() .'-'.$request['title'].'-'.Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/photos/' . $filename);
            //Image::make($image)->resize(1400,1200)->save($location);
            Image::make($image)->save($location);

            $photo->photo = $filename;
        }
        $photo->title = $request['title'];
        $photo->category()->associate($request['category']);

        $photo->user_name = Auth::user()->name;
        $photo->user_type = "admin";

        $message = "there is was a error";
        if ($request->admin()->photos()->save($photo)) {
            $message = "Your Photo successfully created !";
        }


        return redirect()->route('admin.photos.all')->with(['message' => $message]);
    }

    public function all_photos()
    {

        $photos = Photo::all();
        // $cats = Category::all();
        $cats = Category::where('category_of',null)->get();

        return view('admin.photos.index', compact('photos', 'cats'));
    }

    public function delete_photos($id)
    {
        $post = Photo::where('id', $id)->first();

        if ($post) {
            $filename = $post->photo;
            $fullPath = public_path() . '/c_images/photos/' . $filename;
            if (File::exists($fullPath)) File::delete($fullPath);

            $post->delete($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }
        // $message ="Your Photo successfully Deleted !";
        // return redirect()->route('admin.photos.all')->with(['message'=>$message]);

        return response()->json([
            'errors' => 'we cant delete this '
        ]);
    }

    public function roles_admins()
    {
        $roles = Role::with('admins')->select('name')->get();

        return view('admin.user.permission.permission',compact('roles'));
    }

    public function users_roles()
    {
        $roles = Role::select('name')->get();

        $admins = Admin::all();
        return view('admin.user.permission.index',compact('roles','admins'));
    }
    public function add_roles()
    {
        return view('admin.user.permission.create');
    }
    public function add_roles_save(Request $request)
    {
        $validator = Validator::make(Input::all(),
            [
                'name'         => 'required|max:255',
                'description'  =>'required'
            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $role = new Role();

        $role->name = ucfirst(str_replace(' ','-',$request['name']));
        $role->private = false;

        $role->description = $request['description'];

        if($role->save())
        {
            return response()->json(['success' => trans('admin.permission.saved_permission')]);
        }
        return response()->json(['errors' => trans('admin.permission.not_saved_permission')]);

    }
    public function add_roles_to_user(Request $request)
    {
        $validator = Validator::make(Input::all(),
            [
                'email' => 'required|email',
            ]);

        if ($validator->fails())
        {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $admin = Admin::where('email',$request['email'])->first();
        // $admin->roles()->detach(Role::where('private',false)->first());
        $admin->roles()->detach();
        $roles = Role::select('name')->get();
        foreach ($roles as $role)
        {
            if($request[$role->name])
            {

                $admin->roles()->attach(Role::where('name',$role->name)->first());
                //  return response()->json(['success' => trans('admin.permission.saved_permission')]);
                //$admin->roles()->increment('counter');
            }

        }


        return redirect()->back();
    }

    public function create_users()
    {

        return view('admin.user.create');
    }

    private function make_token($str)
    {

        $token = md5($str);
        return $token;

    }

    public function store_users(Request $request)
    {

        // validator
        $messages = [
            'name.required' => trans('admin.errors.errors_user'),
            'name.unique'   => trans('admin.errors.errors_is_name'),
            'email.unique'  => trans('admin.errors.errors_is_email'),
            'phone.unique'  => trans('admin.errors.errors_is_phone'),

        ];
        $validator = Validator::make(Input::all(),
            [
                'name' => 'required|max:100|unique:admins',
                'email' => 'required|email|unique:admins',
                'phone' => 'nullable|digits:10|unique:admins',
                'thefile' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
                // 'password'=>'required|Confirmed'
                'password' => 'required'
            ], $messages);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $admin = new Admin();
        $admin->name          = $request['name'];
        $admin->email         = $request['email'];
        $admin->phone         = $request['phone'];
        $admin->password      = Hash::make($request['password']);
        $admin->active        = true;
        $admin->created_by    = Auth::user()->name;
        $admin->confirmation_token = $this->make_token($request['email']);

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'_'.date('Y-m-d').'_avatar_admin_' . str_replace(' ','-',$request['name']). '.' . $image->getClientOriginalExtension();
            $location = public_path('admin/img/avatar/' . $filename);
            Image::make($image)->resize(128, 128)->save($location);
            //Image::make($image)->save($location);
            $admin->avatar = $filename;
        }
        if ($admin->save()) {

            //  $admin->roles()->attach(Role::where('name',$request['permission'])->first());

            /* $data=array(
                 'name'=>$request->name,
                 'email'=>$request->email,
                 'password'=>$request->password
             );

             Mail::send('admin.emails.send_password_to_new_admin',$data,function ($message) use ($data){

                 $message->from('ciprsem@ciprsem.com');
                 $message->to($data['email']);
                 $message->subject('Votre compte Admin a bien eté crée ');
             });*/
            return response()->json(['success' => trans('admin.admins.admins_is_created')]);
        }

        return response()->json(['errors' => ['failed' => "Sorry we have a problem"]]);
    }

    public function all_users()
    {
        $users = Admin::simplePaginate(6,['*'],'admins');;

        return view('admin.user.index', compact('users'));
    }

    public function profile_users()
    {
        $user = Admin::find(Auth::user()->id);

        return view('admin.user.profile', compact('user'));
    }

    public function profile_users_save(Request $request)
    {
        // validator
        $validator = Validator::make(Input::all(),
            [
                'fullname'=>'required',
                'email'=>'required',
                'facebook'=>'required',
                'address'=>'required|min:3',
                'phone'=>'required|digits:10',
                'about'=>'required'
            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $user = Profile::where('admin_id',Auth::user()->id)->first();
        if($user)
        {
            $user->fullname     = $request['fullname'];
            $user->gmail        = $request['email'];
            $user->facebook     = $request['facebook'];
            $user->address      = $request['address'];
            $user->number_phone = $request['phone'];
            $user->about_fr     = $request['about'];
            $user->user_type    = "admin";
        }

        if($request->admin()->profile()->save($user)){
            return response()->json(['success' => trans('admin.profiles.profile_success')]);
        }

        return response()->json(['errors' => ['failed' => trans('admin.profiles.profile_error')]]);

    }

    public function delete_users($id)
    {
        $admin = Admin::find($id);

        if ($admin->HasRole('Administrator') && Auth::user()->id == $id || Auth::user()->id ==$id) {

            return response()->json(['errors' => trans('admin.articles.delete_is_no')]);
        }
        else
        {
            $filename = $admin->avatar;

            $fullPath = public_path() . '/admin/img/avatar/' . $filename;

            if (File::exists($fullPath)) File::delete($fullPath);

            $admin->delete($id);

            $admin->roles()->detach();

            return response()->json(['success' => trans('admin.articles.delete_is_ok')]);
        }

    }

    public function profile()
    {
        $user = Admin::where('id', Auth::user()->id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'theold.required'    => trans('admin.profiles.enter_old_pass'),
            'password.required'  => trans('admin.profiles.enter_new_pass'),
            'password.confirmed' => trans('admin.profiles.error_new_pass'),
        ];
        $validator = Validator::make($data, [

            'email'    => 'required|email|unique:admins,email,'.Auth::user()->id,
            'theold'   => 'required',
            'password_confirmation'=>'required',
            'password' => 'required|confirmed|min:6',

        ], $messages);

        return $validator;
    }

    public function chnage_password(Request $request)
    {


        if (Auth::Check())
        {
            $request_data = $request->All();

            $validator = $this->admin_credential_rules($request_data);

            if ($validator->fails())
            {

                return response()->json(array('errors' => $validator->getMessageBag()->toArray()), 200);
            }

            $current_password = Auth::User()->password;

            if (Hash::check($request_data['theold'], $current_password))
            {

                if(Hash::check($request_data['password'],Auth::User()->password) == $request_data['password'])
                {
                    return response()->json(array('errors' =>['nothing'=> trans('admin.profiles.pass_is_pass')]));
                }

                $admin = Admin::find(Auth::User()->id);
                $admin->password = Hash::make($request_data['password']);
                $admin->email    = $request_data['email'];
                $admin->update();

                return response()->json(array('success' => trans('admin.profiles.profile_success')), 200);
            }
            else
            {
                $error = array('old' => trans('admin.profiles.error_old_pass'));
                return response()->json(array('errors' => $error), 200);
            }

        }
        else
        {
            return redirect()->route('admin.home');
        }

    }

    public function chnage_avatar(Request $request)
    {

        $validator = Validator::make(Input::all(),
            [
                'thefile' => 'required|image|mimes:jpeg,png,jpg|max:1024',

            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $admin = Admin::find(Auth::User()->id);
        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');
            $filename = time().'_'.date('Y-m-d').'_avatar_admin_' .str_replace(' ','-',Auth::user()->name). '.' . $image->getClientOriginalExtension();
            $location = public_path('admin/img/avatar/' . $filename);
            Image::make($image)->resize(128, 128)->save($location);

            $oldimg = public_path('admin/img/avatar/' . $admin->avatar);

            $admin->avatar = $filename;

            File::delete($oldimg);

            $admin->update();

            return response()->json(array('success' => trans('admin.profiles.avatar_success')), 200);

        }
        return redirect()->route('admin.home');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active_user($id)
    {
        $admin = Admin::find($id);

        if($admin)
        {
            switch ($admin->active)
            {
                case true :
                    $admin->active = false;

                    $admin->update();
                    return response()->json(['success' => ['disable'=>true]]);

                    break;
                case false :
                    $admin->active = true;

                    $admin->update();
                    return response()->json(['success' => ['active'=>true]]);

                    break;
                default;
            }
        }
        return response()->json(['errors' =>'somthing wont wrong']);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {


        return view('admin.about.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function about_store(Request $request)
    {

        $validator = Validator::make(Input::all(),
            [
                'trans_lng' => 'required',
                'body' => 'required',
                'thefile' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',

            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $lng= $request['trans_lng'];

        $about = new About();

        switch ($lng)
        {

            case 1 :

                $about->about_ar = $request['body'];
                break;
            case 2 :


                $about->about_fr = $request['body'];

                break;
            case 3 :
                $about->about_en = $request['body'];
                break;
        }
        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '_about_' . 'ciprsem' . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            // Image::make($image)->resize(1270, 840)->save($location);
            Image::make($image)->save($location);
            $about->about_pic = $filename;
        }


        if($about->save())
        {
            return response()->json(['success' => "About is done"]);
        }
        return response()->json(['errors' => "wa have same errors"]);
    }



    public function create_categories()
    {
        $categories = Category::all();

        return view('admin.categories.index',compact('categories'));
    }

    public function store_categories(Request $request)
    {
        $validator = Validator::make(Input::all(),
            [
                'name' => 'required|unique:categories',
                'category_type' => 'required|integer',

            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $catstype = $request['category_type'];

        $category = new Category();
        switch ($catstype)
        {
            case 1 :

                $category->category_of = "articles";
                break;
            case 2 :

                $category->category_of = "photos";
                break;
            case 3 :

                $category->category_of = "vedios";
                break;
        }
        $category->name= $request['name'];
        if($category->save())
        {
            return response()->json(['success' => "category is done"]);
        }
        return response()->json(['errors' => "wa have same errors"]);
    }

    public function delete_categories($id)
    {
        $post = Category::where('id', $id)->first();

        if ($post) {

            $post->delete($id);
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }
        return response()->json([
            'errors' => 'errors in delete!'
        ]);
    }




}
