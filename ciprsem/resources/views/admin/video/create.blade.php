@extends('layouts.admin')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">{{trans('admin.videos.videos')}}</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{URL::route('admin.home')}}">CIPRSEM</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{trans('admin.videos.videos')}}</h3></div>
                    <span class="show_ok label label-danger "></span>
                    <div class="panel-body">

                        <span class="lng_prb label label-danger "></span>
                        <form name="form-videos-add" id="form-videos-add" class="form-horizontal" role="form" action="{{URL::route('admin.videos.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}


                            <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

                            <script type="text/javascript">
                                tinymce.init({
                                    selector:'textarea',
                                    plugins :'link code'
                                    /* directionality :"rtl"
                                     /* menubar :false,*/
                                    /* toolbar: 'undo redo | cut copy paste'*/
                                });
                            </script>
                            <div class="fileupload fileupload-new col-md-10 col-lg-10  " data-provides="fileupload">
                                <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">

                                    <img src="{{asset('admin')}}/demoUpload.jpg" alt="" />
                                </div>
                                <div id="arab_text">
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">{{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists">{{trans('home.prof_form_photo_select')}}</span>
                                        <input type="file" name="thefile" id="thefile">
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
                                </div>

                                <span class="errorthefile label label-danger hidden"></span>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <select class="form-control" name="trans_lng" id="trans_lng" >

                                        <option >{{trans('admin.videos.cat_video')}}</option>

                                    </select>
                                    <span class="errorlng label label-danger hidden"></span>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{trans('admin.videos.title_video')}}">
                                    <span class="errortitle label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-10">
                                    {{Form::text('linke','',[
                                        'id'=>'linke',
                                        'class'=>'form-control',
                                         'placeholder' => trans('admin.videos.linke_video')])}}

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-10">
                                    {{Form::textarea('body','',['id'=>'body','class'=>'form-control'])}}

                                    <span class="errorbody label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group ">
                                <hr>
                                <button type="submit" id="btn-save-article" class="btn btn-primary"  > {{trans('admin.videos.save_video')}}</button>
                            </div>

                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->

    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.video.java.videos')

@endsection



