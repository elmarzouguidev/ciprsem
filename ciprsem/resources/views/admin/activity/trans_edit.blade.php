@extends('layouts.admin')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">{{trans('admin.articles.trans_articles')}}</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{URL::route('admin.home')}}">CIPRSEM</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{trans('admin.articles.trans_articles')}}</h3></div>
                    <div class="panel-body">
                        <span class="show_ok label label-danger "></span>
                        <span class="lng_prb label label-danger "></span>
                        <div class="need_tr">
                            @if(count($fr)>0)
                                <section  class="content-header box-infos-trans">
                                    <a style="color: #000"> {{trans('admin.articles.trs_fr')}}</a>
                                </section>
                            @endif
                            @if(count($en)>0)
                                <section  class="content-header box-infos-trans">

                                    <a style="color: #000"> {{trans('admin.articles.trs_en')}}</a>
                                </section>
                            @endif
                            @if(count($ar)>0)
                                <section  class="content-header box-infos-trans">

                                    <a style="color: #000"> {{trans('admin.articles.trs_ar')}}</a>
                                </section>
                            @endif
                        </div>
                        <section class="content-header box-infos-trans hidden" id="trans_ok">
                            <span class="content-title"> </span>
                            <a style="color: #000"></a>
                        </section>
                        <form name="form-article-trans" id="form-article-trans" class="form-horizontal" role="form" action="{{URL::route('admin.activities.trans.save',$articles_edit->id)}}" method="post" enctype="multipart/form-data">
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

                                    <img src="{{asset('c_images/articles'.'/'.$articles_edit->pic)}}">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-10">
                                    <select class="form-control" name="trans_lng" id="trans_lng">

                                        <option value="">{{trans('admin.articles.trans_lng')}}</option>
                                        @if(count($ar)>0)
                                            <option value="1">{{trans('admin.articles.trans_lng_ar')}}</option>
                                        @endif
                                        @if(count($fr)>0)
                                            <option value="2">{{trans('admin.articles.trans_lng_fr')}}</option>
                                        @endif
                                        @if(count($en)>0)
                                            <option value="3">{{trans('admin.articles.trans_lng_en')}}</option>
                                        @endif
                                    </select>
                                    <span class="errorlng label label-danger hidden"></span>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-md-10">
                                    <input type="text" name="title" id="title" class="form-control" value="{{$articles_edit->title_ar}}">
                                    <span class="errortitle label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-10">
                                    {{Form::textarea('body',$articles_edit->body_ar,[
                                       'id'=>'body',

                                       'class'=>'form-control'
                                    ])}}

                                    <span class="errorbody label label-danger hidden"></span>
                                </div>

                            </div>

                            <div class="form-group ">
                                <hr>
                                <button type="submit" id="btn-save-article" class="btn btn-primary">
                                    {{trans('admin.articles.trans_article_enter_ok')}}
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

    @include('admin.activity.java.trans_java')

@endsection



