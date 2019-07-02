@foreach($articles as  $article)
    <div class="biography" data-id="{{$article->id}}">

        <div class="biographys">
            <div class="col-md-8 biography-into">
                <h4>{!! $article->title_fr!!}</h4>
                <a href="{{URL::route('article.edit',$article->id)}}"    class="btn btn-xs btn-primary">modifier</a>
                {{Form::open(['route'=>['article.delete',$article->id],'method'=>'DELETE'])}}
                {{Form::submit('supprimer ',['class'=>'btn btn-danger'])}}
                {{Form::close()}}
            </div>

            <div class="col-md-4 biography-info">
                <img src="{{asset('c_images'.'/'.$article->pic)}}" class="img-responsive" alt=""/>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endforeach