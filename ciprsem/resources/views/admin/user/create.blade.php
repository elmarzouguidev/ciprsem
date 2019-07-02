@extends('layouts.admin')

@section('content')

    <div class="container">



        <div class="row">

                <div class="panel panel-color panel-primary panel-pages ">
                    <div class="panel-heading bg-img">
                        <div class="bg-overlay"></div>
                        <h3 class="text-center m-t-10 text-white"> {{trans('admin.admins.add_admin')}} </h3>
                    </div>


                    <div class="panel-body">
                        <p id="is_created" class="hidden text-center" style="color: blue"></p>
                        <form class="form-horizontal m-t-40" method="post" name="form-user-add" id="form-user-add" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <div class="col-xs-12">

                                    {{Form::text('name','',['id'=>'name',
                                    'placeholder'=>trans('admin.admins.admins_account_name'),
                                    'class'=>'form-control input-lg',

                                     ])}}
                                </div>
                                <p id="err_name" class="hidden" style="color: red"></p>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    {{Form::text('email','',['id'=>'email',
                                       'placeholder'=>trans('admin.admins.admins_account_email'),
                                       'class'=>'form-control input-lg',

                                     ])}}
                                </div>
                                <p id="err_email" class="hidden" style="color: red"> </p>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    {{Form::text('password','',['id'=>'password',
                                       'placeholder'=>trans('admin.admins.admins_account_pass'),
                                       'class'=>'form-control input-lg',

                                     ])}}
                                </div>
                                <p id="err_pass" class="hidden" style="color: red"> </p>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    {{Form::text('phone','',['id'=>'phone',
                                      'placeholder'=>trans('admin.admins.admins_account_phone'),
                                       'class'=>'form-control input-lg',

                                    ])}}
                                </div>
                                <p id="err_phone" class="hidden" style="color: red"> </p>
                            </div>


                            <div class="form-group">
                                <div class="fileupload fileupload-new " data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">

                                        <img src="{{asset('admin')}}/demoUpload.jpg" alt="" />
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
                                <p id="err_file" class="hidden" style="color: red"> </p>
                            </div>

                            <div class="form-group text-center m-t-40">
                                <div class="col-xs-12">
                                    <button id="btn-user-add" name="btn-user-add" class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>


        </div> <!-- End row -->

        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>

    </div> <!-- container -->


@endsection

@section('script_master')

    @include('admin.user.java.user')

@endsection

