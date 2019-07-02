@extends('layouts.admin')

@section('content')


    <div class="content">
        <div class="container">

            <div class="row">

                <!-- Left sidebar -->

                <div class="col-md-4 col-lg-3">


                    <div class="panel panel-default p-0 m-t-20">
                        <div class="panel-body p-0">
                            <div class="list-group mail-list">
                                <a href="{{URL::route('admin.ciprsem.settings')}}" class="list-group-item no-border ">
                                    <i class="md  md-account-balance m-r-5"></i>
                                    {{trans('admin.settings.home_settings')}}
                                </a>
                                <a href="{{URL::route('admin.ciprsem.settings.news')}}" class="list-group-item no-border">
                                    <i class="fa fa-star-o m-r-5"></i>
                                    {{trans('admin.settings.news_settings')}}
                                </a>
                                <a href="{{URL::route('admin.ciprsem.settings.activities')}}" class="list-group-item no-border ">
                                    <i class="fa fa-book m-r-5"></i>
                                    {{trans('admin.settings.activities_settings')}}
                                </a>
                                <a href="{{URL::route('admin.ciprsem.settings.picturs')}}" class="list-group-item no-border ">
                                    <i class="fa fa-star-o m-r-5"></i>
                                    {{trans('admin.settings.picturs_settings')}}
                                </a>
                                <a href="#" class="list-group-item no-border active">
                                    <i class="fa fa-star-o m-r-5"></i>
                                    {{trans('admin.settings.videos_settings')}}
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Left sidebar -->

                <!-- Right Sidebar -->
                <form role="form" id="add-background" name="add-background" method="post">
                    {{csrf_field()}}
                    <div class="col-md-8 col-lg-9">


                        <div class="panel panel-default m-t-20">
                            <div class="panel-body p-t-30">

                                <a  id="if-errors" class="btn btn-danger waves-effect waves-light btn-block hidden">

                                </a>
                                <a  id="if-ok" class="btn btn-info waves-effect waves-light btn-block hidden">

                                </a>

                                <a   class="btn btn-info waves-effect waves-light btn-block ">
                                    {{trans('admin.settings.condition.length')}}
                                </a>
                                <a   class="btn btn-default waves-effect waves-light btn-block ">
                                    {{trans('admin.settings.condition.max_h')}}
                                    {{trans('admin.settings.condition.max_height')}}
                                    {{trans('admin.settings.condition.max_w')}}
                                    {{trans('admin.settings.condition.max_width')}}
                                </a>
                                <a   class="btn btn-default waves-effect waves-light btn-block ">
                                    {{trans('admin.settings.condition.min_h')}}
                                    {{trans('admin.settings.condition.min_height')}}
                                    {{trans('admin.settings.condition.min_w')}}
                                    {{trans('admin.settings.condition.min_width')}}
                                </a>


                                <div class="fileupload fileupload-new" data-provides="fileupload" id="vedio_background">

                                    <div class="fileupload-preview thumbnail col-md-12" >


                                        @if(!empty($background->videos_background))

                                            <img src="{{asset('ciprsem/background'.'/'.$background->videos_background)}}" alt="" />
                                        @else
                                            <img src="{{asset('admin')}}/demoUpload.jpg" alt="" />
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <span class="btn btn-file btn-success">
                                            <span class="fileupload-new">حدد مكان الصورة</span>
                                            <span class="fileupload-exists">رفع الصورة</span>
                                            <input type="file" name="thefile" id="thefile">

                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حدف الصورة</a>

                                    </div>
                                </div>

                            </div> <!-- panel -body -->
                        </div> <!-- panel -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-5" id="save-background"><i class="fa fa-floppy-o"></i></button>

                                        <a  class="delete_background btn btn-danger waves-effect waves-light m-r-5 {{$background->videos_background ?'':'disabled'}} " data-id="{{$background->id}}" data-token="{{csrf_token()}}" >
                                            <i class="fa fa-trash-o"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Rightsidebar -->
                </form>
            </div><!-- End row -->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection

@section('script_master')

    @include('admin.settings.java.vedios_background')

@endsection