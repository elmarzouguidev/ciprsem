@extends('layouts.admin')

@section('content')

    <div class="content">

        <div class="wraper container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bg-picture text-center" style="background-image:url('images/big/bg.jpg')">
                        <div class="bg-picture-overlay"></div>
                        <div class="profile-info-name">
                            @if($user->avatar)
                                <img class="thumb-lg img-circle img-thumbnail" src="{{asset('admin/img/avatar'.'/'.$user->avatar)}}">
                            @else
                                <img class="thumb-lg img-circle img-thumbnail" src="{{asset('admin')}}/img/avatar/no_avatar.png">
                            @endif
                            <h3 class="text-white">{{$user->name}}</h3>
                        </div>
                    </div>
                    <!--/ meta -->
                </div>
            </div>
            <div class="row user-tabs">
                <div class="col-lg-6 col-md-9 col-sm-9">
                    <ul class="nav nav-tabs tabs">

                        <li class="tab" >
                            <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                <span class="hidden-xs">{{trans('admin.profiles.password_setting')}}</span>
                            </a>
                        </li>

                        <li class="tab" >
                            <a href="#settings-3" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="fa  fa-user"></i></span>
                                <span class="hidden-xs">{{trans('admin.profiles.avatar_setting')}}</span>
                            </a>
                        </li>

                        <div class="indicator"></div>
                    </ul>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="tab-content profile-tab-content">

                        <div class="tab-pane active myprofile" id="settings-2">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">{{trans('admin.profiles.password_setting')}}</h3>
                                </div>
                                <div class="panel-body">
                                    <p id="is_created" class="hidden text-center" style="color: blue"></p>
                                    <p id="err_nothing" class="hidden text-center" style="color: red"></p>

                                    <form name="form-user-edit" id="form-user-edit" role="form" method="post" enctype="multipart/form-data" action="{{URL::route('admin.settings.save')}}">

                                        {{csrf_field()}}
                                        <div class="form-group">

                                            <input type="text" name="name" value="{{$user->name}}" id="name" class="form-control" readonly="readonly">
                                            <p id="err_name" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">

                                            <input type="email" name="email" value="{{$user->email}}" id="email" class="form-control">
                                            <p id="err_email" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">

                                            <input type="text" name="theold" id="theold" placeholder="{{trans('admin.admins.admins_account_passold')}}" class="form-control">
                                            <p id="err_pass_old" class="hidden" style="color: red"></p>
                                            <p id="err_" class="hidden" style="color: blue"> </p>
                                        </div>

                                        <div class="form-group">

                                            <input type="password" name="password" id="password" placeholder="{{trans('admin.admins.admins_account_passnew')}}" class="form-control">
                                            <p id="err_pass" class="hidden" style="color: red"></p>
                                        </div>

                                        <div class="form-group">

                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{trans('admin.admins.admins_account_passnew_conf')}}" class="form-control">
                                            <p id="err_pass_conf" class="hidden" style="color: red"></p>
                                        </div>

                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                    </form>

                                </div>
                            </div>
                            <!-- Personal-Information -->
                        </div>

                        <div class="tab-pane" id="settings-3">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        {{trans('admin.profiles.avatar_setting')}}

                                    </h3>
                                    <p id="err_file" class="hidden" style="color: red"> </p>
                                    <p id="is_file" class="hidden text-center" style="color: blue"></p>
                                </div>
                                <div class="panel-body">

                                    <form  name="form-user-edit-avatar" id="form-user-edit-avatar" role="form" method="post" enctype="multipart/form-data" action="{{URL::route('admin.settings.avatar')}}">

                                        {{csrf_field()}}
                                        <div class="form-group" id="avatar">
                                            <div class="fileupload fileupload-new " data-provides="fileupload">
                                                <div class="fileupload-preview thumbnail col-md-4 col-lg-4 " >
                                                    @if(Auth::user()->avatar)
                                                        <img  src="{{asset('admin/img/avatar'.'/'.Auth::user()->avatar)}}">
                                                    @else
                                                        <img  src="{{asset('admin')}}/img/avatar/no_avatar.png" />
                                                    @endif

                                                </div>
                                                <div id="arab_text">
                                                <span class="btn btn-file btn-success"><span class="fileupload-new">{{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists">{{trans('home.prof_form_photo_select')}}</span>
                                                    {{Form::file('thumb',['type'=>'file','id'=>'thumb',
                                                      'name'=>'thefile',

                                                      ])}}
                                                 </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
                                                </div>


                                            </div>

                                        </div>

                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                    </form>

                                </div>
                            </div>
                            <!-- Personal-Information -->
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- container -->

    </div> <!-- content -->

@endsection
@section('script_master')

    @include('admin.user.java.edit_java')

@endsection