@foreach($articles as $article)
    <div class="col-lg-4 activities{{$article->id}}">
        <div class="panel panel-border panel-warning">
            <div class="panel-heading">
                <h2 class="panel-title">{{$article->title_ar}}</h2>
            </div>
            <div class="panel-body">
                <img width="100%" height="50%"  src="{{asset('c_images/articles'.'/'.$article->pic)}}" alt="">
                <a href="{{URL::route('activities.single',$article->slug)}}" class="btn btn-success m-t-15" target="_blank">عرض</a>

                <a href="{{URL::route('admin.activities.edit',$article->id)}}" class="btn btn-primary m-t-15">تعديل</a>

                <a id="{{$article->id}}" class="delete_activity btn btn-danger m-t-15" data-id="{{$article->id}}" data-token="{{csrf_token()}}">حذف</a>

                @if($article->active==false)
                    <a href="{{URL::route('admin.activities.enable',$article->id)}}" class="btn btn-success m-t-15">اظهار</a>
                @endif
                @if($article->active==true)
                    <a href="{{URL::route('admin.activities.disable',$article->id)}}" class="btn btn-warning m-t-15">اخفاء</a>
                @endif
            </div>

        </div>
    </div>
@endforeach