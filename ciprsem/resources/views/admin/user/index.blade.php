@extends('layouts.admin')

@section('content')

    <div class="container">



        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                 <a href="{{URL::route('admin.users.add')}}" type="button" class="btn-lg btn waves-effect waves-light btn-primary w-md">
                                     {{trans('admin.admins.add_admin')}}

                                 </a>
                             </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            @foreach($users as $user)
                <div class="col-sm-6 col-lg-4 user{{$user->id}}">
                    <div class="panel">
                        <div class="panel-body">

                            <div class="media-main">
                                <div class="info">
                                    <h4>{{$user->name}}</h4>
                                    <p class="text-muted">
                                        {{$user->email}}
                                    </p>

                                </div>
                                <hr>
                                <a class="pull-left" href="#">

                                    @if($user->avatar)
                                        <img class="thumb-lg img-circle" src="{{asset('admin/img/avatar'.'/'.$user->avatar)}}">
                                    @else
                                        <img class="thumb-lg img-circle" src="{{asset('admin')}}/img/avatar/no_avatar.png">
                                    @endif
                                </a>


                                <div class="pull-right btn-group-sm status{{$user->id}}">

                                    @if(Auth::user()->HasRole('Global-Admin'))
                                        <a id="status_account" data-id="{{$user->id}}" data-token="{{csrf_token()}}" class="unlock_account btn btn-warning waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Unlock / lock this account">
                                            <i class="{{$user->active ?'fa fa-unlock' : 'fa fa-lock'}}"></i>
                                        </a>
                                    @endif

                                    @if(Auth::user()->HasRole('Global-Admin') && Auth::user()->id != $user->id)
                                        <a id="{{$user->id}}" data-id="{{$user->id}}" data-token="{{csrf_token()}}" class="delete_user btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Delete">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    @endif

                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- end col -->

            @endforeach


        </div> <!-- End row -->

        <div class="row">
            <div class="col-sm-12">
                {{$users->links()}}
            </div>
        </div>

    </div> <!-- container -->


@endsection

@section('script_master')

    @include('admin.user.java.delete')

@endsection

