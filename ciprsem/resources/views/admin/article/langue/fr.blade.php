@foreach($articles as $article)
    <div class="col-lg-4 article{{$article->id}}">
        <div class="panel panel-border panel-primary">
            <div class="panel-heading">
                <h2 class="panel-title">{{$article->title_fr}}</h2>
            </div>
            <div class="panel-body article_status{{$article->id}}">
                <img width="100%" height="50%"  src="{{asset('c_images/articles'.'/'.$article->pic)}}" alt="">
                <a href="{{URL::route('news.single',$article->slug)}}" class="btn btn-success m-t-15" target="_blank">عرض</a>

                <a href="{{URL::route('admin.article.edit',$article->id)}}" class="btn btn-primary m-t-15">تعديل</a>

                <a id="{{$article->id}}" class="delete_article btn btn-danger m-t-15" data-id="{{$article->id}}" data-token="{{csrf_token()}}">حذف</a>

                <a id="status_article" data-id="{{$article->id}}" data-token="{{csrf_token()}}" class="active_article btn {{$article->active ?'btn-success' : 'btn-danger'}} m-t-15">

                    <i class="{{$article->active ?'fa fa-unlock' : 'fa fa-lock'}}"></i>
                </a>

                @if($article->comments)
                    <a href="{{URL::route('admin.article.comments',$article->slug)}}" class="btn btn-warning m-t-15" data-toggle="tooltip" data-original-title="Comments">
                        <i class="md  md-mode-comment">{{$article->comments()->count()}}</i>
                    </a>
                @endif
            </div>

        </div>
    </div>
@endforeach