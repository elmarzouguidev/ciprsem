@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')
    <header class="header">
        <div id="cipresim-all-categories">
            <div class="container">

                <div class="row">

                    <div class="col-md-3 col-sm-6 text-center cipresim-animate">
                        <div class="cipresim-offre">
						<span class="icon">
							<i class="icon icon-image-outline"></i>
						</span>
                            <div class="cipresim-description">
                                <h3><a href="#" data-toggle="modal" data-target="#myback">الخلفية</a></h3>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-3 col-sm-6 text-center cipresim-animate">
                        <div class="cipresim-offre">
						<span class="icon">
							<i class="icon-facebook2"></i>
						</span>
                            <div class="cipresim-description">
                                <h3><a href="#" data-toggle="modal" data-target="#facebook">{{trans('home.prof_about_facebook')}}</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 text-center cipresim-animate">
                        <div class="cipresim-offre">
						<span class="icon">
							<i class="glyphicon-envelope"></i>
						</span>
                            <div class="cipresim-description">
                                <h3><a href="#" data-toggle="modal" data-target="#email">Email</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 text-center cipresim-animate">
                        <div class="cipresim-offre">
						<span class="icon">
							<i class="icon-pencil"></i>
						</span>
                            <div class="cipresim-description">
                                <h3><a href="{{URL::route('personel.about',Auth::user()->name)}}">تعديل سيرتي</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 text-center cipresim-animate">
                        <div class="cipresim-offre">
						<span class="icon">
							<i class="fa fa-file-image-o"></i>
						</span>
                            <div class="cipresim-description">
                                <h3><a href="#" data-toggle="modal" data-target="#myphoto">صورتي الشخصية</a></h3>
                            </div>
                        </div>


                    </div>



                </div>
            </div>
        </div>

    </header><!--//header-->





    <!-- Modal -->
    <div id="facebook" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route'=>['facebook.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group">

                        {{ Form::text('linke',$profile->facebook,['class'=>'form-control','id'=>'title','placeholder'=>'facebook.com']) }}

                    </div>
                    <div class="form-group">
                        {{ Form::submit('عدل',['class'=>'btn btn-primary btn-sm cipresim-btn']) }}
                    </div>
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>


    <div id="email" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route'=>['email.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group">

                        {{ Form::text('email',$profile->gmail,['class'=>'form-control','id'=>'title','placeholder'=>'@gmail.com or ..']) }}

                    </div>
                    <div class="form-group">
                        {{ Form::submit('عدل',['class'=>'btn btn-primary btn-sm cipresim-btn']) }}
                    </div>
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>


    <div id="myphoto" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route'=>['about.photo.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal','files'=>true]) }}
                    <div class="form-group">

                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail">
                                <img src="{{asset('images/profile/abdelghafour'.'/'.$profile->photo)}}">
                            </div>
                            <div class="col-lg-4 col-lg-offset-4" >
                                <span class="btn btn-file btn-success"><span class="fileupload-new"> اخنر صورة جديدة</span><span class="fileupload-exists">رفع الصورة</span><input type="file" name="thefile" required="required"></span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حدف الصورة</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4">
                            {{ Form::submit('عدل',['class'=>'btn btn-primary btn-sm ']) }}
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>

            </div>
        </div>

    </div>
    <div id="myback" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(['route'=>['about.photo.ground.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal','files'=>true]) }}
                    <div class="form-group">

                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail">
                                <img src="{{asset('images/profile/abdelghafour'.'/'.$profile->background)}}">
                            </div>
                            <div class="col-lg-4 col-lg-offset-4" >
                                <span class="btn btn-file btn-success"><span class="fileupload-new"> اخنر صورة جديدة</span><span class="fileupload-exists">رفع الصورة</span><input type="file" name="thefile" required="required"></span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حدف الصورة</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-4">
                            {{ Form::submit('عدل',['class'=>'btn btn-primary btn-sm ']) }}
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>

            </div>
        </div>

    </div>

    <div id="mypass" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">



                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection