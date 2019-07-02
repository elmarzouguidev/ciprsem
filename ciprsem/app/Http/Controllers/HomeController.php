<?php

namespace App\Http\Controllers;


use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use App\Article;
use App\Profile;
use App\Activity;
use App\Video;
use App\About;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */

    public function __construct()
    {
        $this->middleware('web');
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function down()
    {
         Artisan::call('down');
    }*/

    public function index()
    {

        $articles   = Article::Online(true,6);

        return view('public.home.index',compact('articles'));
    }

    public function news()
    {

        $articles      = Article::OnlineWithPaginate(4);

        $articles_menu = Article::Online(true,8);

        return view('public.news.index',compact('articles','articles_menu'));
    }


    public function news_single($slug)
    {
        $blogKey = 'CiprsemArticle_' . $slug;

        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($blogKey)) {

            Article::IncrementView($slug);

            Session::put($blogKey, 1);

        }
        $singles       = Article::SingleArticle($slug);

        $articles_menu = Article::Online(true,8);

        return view('public.news.single',compact('singles','articles_menu'));
    }

    public function activities()
    {
        $articles = Activity::where('active',true)->simplePaginate(4,['*'],'activity');
        return view('public.activity.index',compact('articles'));
    }
    public function activities_single($slug)
    {

        $singles = Activity::where('slug',$slug)->FirstOrFail();
        $articles_menu = Activity::orderBy('created_at', 'DESC')->limit(8)->get();
        return view('public.activity.single',compact('singles','articles_menu'));
    }

    public function histoire()
    {

        $histoirs = Article::where('category_id',4)->get();
        return view('public.histoire.index',compact('histoirs'));
    }
    public function histoire_single()
    {
        return view('public.histoire.single');
    }

    public function kitabat()
    {
        return view('public.kitabat.index');
    }
    public function photos()
    {

        $photos     = Photo::all();

        $categories = Category::where('category_of',null)->get();

        return view('public.photos.index',compact('photos','categories'));

    }

    public function videos()
    {
        $videos = Video::VideoByAdmin();
        return view('public.videos.index',compact('videos'));
    }

    public function profiles()
    {

        $profiles  = Profile::all();
        return view('public.profiles.index',compact('profiles'));
    }
    public function single_profile($name)
    {

        $singles = Profile::where('user_name',$name)->firstOrFail();
        $videos  = Video::where('user_name',$name)
            ->where('admin_id',null)
            ->get();

        return view('public.profiles.single',compact('singles','videos'));
    }


    public function contact_us()
    {
        return view('public.contact.index');
    }

    public function contact_us_send(Request $request)
    {
        /* $this->validate($request,[
         'fullname' => 'required|max:50',
         'email' => 'required|email|max:255',
         'message' => 'required|min:5',

     ]);*/
        $messages = [
            'name.required' => trans('home.contact_us_info.name'),
            'email.required' => trans('home.contact_us_info.email'),
            'message.required' => trans('home.contact_us_info.message')
        ];
        $validator = Validator::make(Input::all(),
            [
                'name' => 'required|max:50',
                'email' => 'required|email|max:255',
                'message' => 'required|min:5',

            ],$messages);

        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'bodymsg'=>$request->message
        );

        Mail::send('public.emails.contact',$data,function ($message) use ($data){

            $message->from($data['email']);
            $message->to('abdo@gmail.com');
            $message->subject('From Contact');
        });
        return response()->json(['success'=>trans('home.suc_contact_msg')]);
        // return redirect()->route('contact.us');
    }

    public function about_us()
    {
        $about = About::where('id',1)->first();
        return view('public.about.index',compact('about'));
    }
}
