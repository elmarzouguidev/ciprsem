@extends('layouts.admin')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">{{trans('admin.articles.add_activities')}}</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{URL::route('admin.home')}}">CIPRSEM</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{trans('admin.articles.add_activities')}}</h3></div>
                    <span class="show_ok label label-danger "></span>
                    <div class="panel-body">

                        <span class="lng_prb label label-danger "></span>
                        <form name="form-activities-add" id="form-activities-add" class="form-horizontal" role="form" action="{{URL::route('admin.activities.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}

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
                                    <select class="form-control" name="trans_lng" id="trans_lng">

                                        <option >{{trans('admin.articles.save_lng')}}</option>

                                        <option value="1" onclick="Rtl()">{{trans('admin.articles.trans_lng_ar')}}</option>

                                        <option value="2" onclick="Ltr()">{{trans('admin.articles.trans_lng_fr')}}</option>

                                        <option value="3" onclick="Ltr()">{{trans('admin.articles.trans_lng_en')}}</option>

                                    </select>
                                    <span class="errorlng label label-danger hidden"></span>
                                </div>
                            </div>
                            @include('admin.editor.tinymce')
                            <div class="form-group">

                                <div class="col-md-10">
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{trans('admin.articles.title_activities')}}">
                                    <span class="errortitle label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    {{Form::text('linke','',[
                                        'id'=>'linke',
                                       'placeholder' => trans('admin.articles.video_activities'),

                                      'class'=>'form-control'

                                    ])}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    {{Form::text('date','',[
                                      'id'=>'date',
                                      'placeholder' => trans('admin.articles.date_activities'),
                                      'class'=>'form-control input-mask-date'

                                    ])}}
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-10">

                                    {{Form::textarea('body','',['id'=>'body'])}}

                                    <span class="errorbody label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group ">
                                <hr>
                                <button type="submit" id="btn-save-activities" class="btn btn-primary">
                                    {{trans('admin.articles.add_activities')}}
                                </button>
                            </div>

                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->

    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.activity.java.activities')

@endsection



