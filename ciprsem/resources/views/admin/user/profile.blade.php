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
                        <li class="active tab">
                            <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                <span class="hidden-xs">About Me</span>
                            </a>
                        </li>

                        <li class="tab" >
                            <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                <span class="hidden-xs">Settings</span>
                            </a>
                        </li>

                        <div class="indicator"></div>
                    </ul>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="tab-content profile-tab-content">
                        <div class="tab-pane active" id="home-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Personal Information</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="about-info-p">
                                                <strong>Full Name</strong>
                                                <br/>
                                                <p class="text-muted">{{$user->profile->fullname}}</p>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Mobile</strong>
                                                <br/>
                                                <p class="text-muted">{{$user->profile->number_phone}}</p>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Email</strong>
                                                <br/>
                                                <p class="text-muted">{{$user->profile->gmail}}</p>
                                            </div>
                                            <div class="about-info-p m-b-0">
                                                <strong>Location</strong>
                                                <br/>
                                                <p class="text-muted">{{$user->profile->address}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->

                                </div>


                                <div class="col-md-8">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Biography</h3>
                                        </div>
                                        <div class="panel-body">
                                            {{$user->profile->about_fr}}
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->



                                </div>

                            </div>
                        </div>

                        <div class="tab-pane myprofile" id="settings-2">
                            <!-- Personal-Information -->
                            <div class="panel panel-default panel-fill" >
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit Profile</h3>
                                </div>
                                <div class="panel-body">
                                    <p id="is_created" class="hidden text-center" style="color: blue"></p>

                                    <form id="form-edit-profile" role="form" method="post">

                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input type="text" name="fullname" value="{{$user->profile->fullname}}" id="fullname" class="form-control">
                                            <p id="err_fullname" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" value="{{$user->profile->gmail}}" id="email" class="form-control">
                                            <p id="err_email" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" name="facebook" value="{{$user->profile->facebook}}" id="facebook" class="form-control">
                                            <p id="err_facebook" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" value="{{$user->profile->number_phone}}" id="phone" class="form-control">
                                            <p id="err_phone" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="adresse">Adresse</label>
                                            <input type="text" name="address" value="{{$user->profile->address}}" id="address" class="form-control">
                                            <p id="err_adresse" class="hidden" style="color: red"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="AboutMe">About Me</label>
                                            <textarea style="height: 125px;" id="about" name="about" class="form-control">
                                                                {{$user->profile->about_fr}}
                                            </textarea>
                                            <p id="err_about" class="hidden" style="color: red"></p>
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

    @include('admin.user.java.profile_java')

@endsection