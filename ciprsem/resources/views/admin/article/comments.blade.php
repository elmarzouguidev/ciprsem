@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            @if($loc=="ar")
                                <p>  {{$singles->title_ar}}</p>
                            @endif

                            @if($loc=="fr")
                                <p>  {{$singles->title_fr}}</p>
                            @endif

                            @if($loc=="en")
                                <p> {{$singles->title_en}} </p>
                            @endif
                        </h3>
                        <img width="100%" height="50%"  src="{{asset('c_images/articles'.'/'.$singles->pic)}}" alt="">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>

                                            <th>Nom</th>
                                            <th>email</th>
                                            <th>comment</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($singles->comments as $comment)
                                            <tr class="comment{{$comment->id}}">
                                                <td>{{$comment->name}}</td>
                                                <td>{{$comment->email}}</td>
                                                <td>{{$comment->comment}}</td>
                                                <td class="actions">

                                                    <a id="status_comment" data-id="{{$comment->id}}" data-token="{{csrf_token()}}" class="active_comment btn {{$comment->active ?'btn-success' : 'btn-danger'}} m-t-15">

                                                        <i class="{{$comment->active ?'fa fa-unlock' : 'fa fa-lock'}}"></i>
                                                    </a>


                                                    <a id="{{$comment->id}}" data-id="{{$comment->id}}" data-token="{{csrf_token()}}" class="delete_comment btn btn-danger m-t-15" data-toggle="tooltip" data-original-title="Delete this comment">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->
    </div>

@endsection
@section('script_master')

    @include('admin.article.java.delete')

@endsection