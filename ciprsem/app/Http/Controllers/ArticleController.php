<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Comment;
use App\Profile;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\File;



class ArticleController extends Controller
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
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $articles = Article::where('user_id',Auth::user()->id)
            ->where('user_name',Auth::user()->name)
            ->get();
        return view('profile.article.index',compact('articles','loc','profile'));
    }


    public function create()
    {
        $loc =$this->getCurrentLocale();
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $cats = Category::where('category_of','articles')->get();
        $articles = Article::where('user_id',Auth::user()->id)
            ->where('user_name',Auth::user()->name)
            ->get();
        return view('profile.article.create',compact('profile','cats','loc','articles'));

    }

    public function store(Request $request)
    {
        // validator


       /* $this->validate($request, [
            'body' => 'required|min:20',
            'title' => 'required|min:5',
            'cats' => 'required|integer',
            'thefile' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);*/

        $validator = Validator::make(Input::all(),
            [
                'body' => 'required|min:20',
                'title' => 'required|min:5',
                'cats' => 'required|integer',
                'thefile' => 'required|image|mimes:jpeg,png,jpg|max:2048',
               /* 'thefile' => 'required|image|
                 mimes:jpeg,png,jpg|max:2048|
                 dimensions:max_width=500,max_height=500',*/


            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $loc = $this->getCurrentLocale();
       // $image = Input::file('thefile');
        $article = new Article();

        switch ($loc) {
            case 'fr':
                $article->title_fr = $request['title'];
                $article->body_fr = $request['body'];
                $article->translated = 'fr';
                $article->slug = $request['title'];
                break;

            case 'en':
                $article->title_en = $request['title'];
                $article->body_en = $request['body'];
                $article->slug = $request['title'];
                break;

            case 'ar':
                $article->title_ar = $request['title'];
                $article->body_ar = $request['body'];
                $article->slug = $request['title'];
                break;
            default:

        }

        if ($request->hasFile('thefile')) {
            $image = $request->file('thefile');

            $filename = time() . '.' . Auth::user()->name . '.' . $image->getClientOriginalExtension();
            $location = public_path('c_images/articles/' . $filename);
            //Image::make($image)->resize(1400,1200)->save($location);
            Image::make($image)->save($location);
            $article->pic = $filename;
        }

        $article->user_name = Auth::user()->name;

        $article->category_id = $request['cats'];
        if ($request->user()->articles()->save($article)) {
           // $message = "Your post successfully created !";
           // return redirect()->route('article.show.all')->with(['message' => $message]);
            return response()->json(['success'=>trans('home.added_article')]);
        }


        return redirect()->route('article.show.all')->with(['message' =>"Error"]);




    }


    public function need_translate()
    {

        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $loc =$this->getCurrentLocale();
        $articles_tr = Article::where('user_id',Auth::user()->id)

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

        return view('profile.article.need_translate',compact('articles_tr','loc','profile'));
    }

    public function need_translate_update($id)
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $loc =$this->getCurrentLocale();
        $articles_edits = Article::where('id',$id)
            ->where('user_id',Auth::user()->id)
            ->get();
        $fr = Article::where('id',$id)

            ->where('title_fr',null)
            ->where('body_fr',null)
            ->where('user_id',Auth::user()->id)
            ->get();
        $en = Article::where('id',$id)

            ->where('title_en',null)
            ->where('body_en',null)
            ->where('user_id',Auth::user()->id)
            ->get();
        $ar = Article::where('id',$id)

            ->where('title_ar',null)
            ->where('body_ar',null)
            ->where('user_id',Auth::user()->id)
            ->get();
        return view('profile.article.trans.trans_article',compact('articles_edits','fr','en','ar','loc','profile'));
    }

    public function translate_update(Request $request ,$id)
    {
        $articles_o = Article::find($id);
        $loc =$this->getCurrentLocale();
        switch ($loc)
        {
            case 'fr':
                $articles_o->title_fr = $request['title'];
                $articles_o->body_fr = $request['body'];
                $articles_o->translated = "en";
                break;

            case 'en':
                $articles_o->title_en = $request['title'];
                $articles_o->body_en = $request['body'];
                $articles_o->translated = "ar";
                break;
            case 'ar':
                $articles_o->title_ar = $request['title'];
                $articles_o->body_ar = $request['body'];
                $articles_o->translated = "ok";
                break;
        }
        //$articles_o->body_en = $request['body'];
        // $articles_o->translated = "en";
        $articles_o->update();
        return redirect()->route('article.show.all')->with(['message' => 'Good']);

    }

    public function article_edite($id)
    {
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        $loc =$this->getCurrentLocale();
        $articles_edit = Article::find($id);
        return view('profile.article.edit.edite',compact('articles_edit','loc','profile'));
    }

    public function article_delete($id)
    {
        $post = Article::where('id',$id)

            ->where('user_id',Auth::user()->id)
            ->where('user_name',Auth::user()->name)
            ->first();
        $comm = Comment::where('article_id',$id)
            ->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        if($post)
        {
            $filename = $post->pic;
            $fullPath = public_path().'/c_images/articles/' . $filename;
            if(File::exists($fullPath)) File::delete($fullPath);
            $post->delete($post->id);

            if($comm)
            {
                $comm->delete($comm->id);
            }

        }

        return redirect()->route('article.show.all');


    }
}
