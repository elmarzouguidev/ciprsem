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
                    <div class="panel-heading"><h3 class="panel-title">{{trans('admin.articles.add_articles')}}</h3></div>
                    <div class="panel-body">
                        <section class="content-header box-infos-header" id="edit_ok">
                            <a href="#" class="show_ok" style="color: #000">

                            </a>
                        </section>
                        <form name="form-videos-edit" id="form-videos-edit" class="form-horizontal" role="form" action="{{URL::route('admin.videos.edit.save',$articles_edit->id)}}" method="post" enctype="multipart/form-data">
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

                                    @if($articles_edit->img)
                                        <img  src="{{asset('c_images/articles'.'/'.$articles_edit->img)}}">
                                    @else
                                        <img  src="{{asset('admin')}}/img/thumbs/articles/no_thumb.jpg">
                                    @endif
                                </div>
                                <div id="arab_text">
                                    <span class="btn btn-file btn-success"><span class="fileupload-new">{{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists">{{trans('home.prof_form_photo_select')}}</span>
                                        {{Form::file('thumb',['type'=>'file','id'=>'thumb',
                                            'name'=>'thefile',
                                            'class'=>'hidden-input-file','onchange'=>'readUrl(this);'
                                        ])}}
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
                                </div>
                                <span class="errorthefile label label-danger hidden"></span>
                            </div>

                            <div class="form-group">

                                <div class="col-md-10">
                                    <input type="text" name="title" id="title" class="form-control" value="{{$articles_edit->title}}">
                                    <span class="errortitle label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-10">

                                    {{Form::text('linke',$articles_edit->linke,[
                                        'id'=>'linke',
                                        'placeholder' => trans('admin.videos.linke_video'),

                                        'class'=>'form-control'

                                     ])}}


                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-10">

                                    {{Form::textarea('body',$articles_edit->desc,['id'=>'body'])}}

                                    <span class="errorbody label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group ">
                                <hr>
                                <button type="submit" id="btn-save-videos"  class="btn btn-primary"  > {{trans('admin.articles.update_ok')}}</button>
                            </div>

                        </form>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->

    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.video.java.edit_video_java')

@endsection



