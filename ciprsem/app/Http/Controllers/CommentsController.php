<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  /*  public function __construct()
    {

        $this->middleware('web');

    }*/

    protected $rules =
        [
            'comment' => 'required|min:5',
            'name'=>'required|min:3|max:128',
            'email'=>'required|email',
        ];

    public function store(Request $request , $article_id)
    {
        //
        $messages = [
            'comment.required' => trans('home.comments.write'),
            'name.required' => trans('home.comments.nome'),
            'email.required' => trans('home.comments.email')
        ];
        $validator = Validator::make(Input::all(), $this->rules,$messages);

        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $article = Article::find($article_id);
        $comment = new Comment();
        $comment->name= $request->name;
        $comment->email= $request->email;
        $comment->comment= $request->comment;
        $comment->active= false;
        $comment->article()->associate($article);

        if($comment->save())
        {
            return response()->json(['saved'=>trans('home.save_comments')]);
        }
        //return redirect()->route('news.single',[$article_id])->with(['message' => 'Good']);
        return response()->json(['errors'=>'Err']);

    }

    public function destroy($comment_id)
    {

        $comment    = Comment::find($comment_id);
        if($comment)
        {
            $comment->delete();
            return response()->json(['success' =>'comment deleted']);

        }
        return response()->json(['errors' =>'comment not deleted']);

    }
}
