@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <span class="content-title"><i class="fa fa-edit"></i>About</span>
    </section>
    <section class="content">
        @if($loc=="ar")
            <form method="post" name="form-about-add" id="form-about-add" enctype="multipart/form-data" action="{{URL::route('admin.about.store')}}">
                {{csrf_field()}}
                <div class="row form-add-top">
                    <div class="col-sm-8 col-xs-12">
                        <div class="box-infos-search">
                            <section class="content-header box-infos-header">
                                <span class="content-title"><i class="fa fa-home"></i> </span>
                                <a href="#" class="show_ok" style="color: #fff">

                                </a>
                            </section>

                            <section class="content-header box-infos-errors lng_prb hidden">
                                <span class="content-title"><i class="fa  fa-exclamation-circle"></i> </span>
                                <a href="#" class="lng-err" style="color: #000">

                                </a>
                            </section>
                            <div class="box-infos">

                                <input type="hidden" name="box-infos-id" class="box-infos-id">
                                <h3 class="box-infos-name"></h3>
                                <p class="box-infos-city"></p>
                                <p class="box-infos-address"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="box-infos-search">
                            <section class="content-header box-infos-header">
                                <span class="content-title"><i class="fa fa-image"></i>  {{trans('admin.articles.select_img')}}</span>
                                <a href="#" class="btn btn-default btn-search" onclick="triggerInputFile('thumb', event);">
                                    <i class="fa fa-search"></i>
                                </a>

                            </section>
                            <div class="box-infos text-center">
                                <img class="thumb-preview" src="{{asset('admin')}}/img/thumbs/articles/no_thumb.jpg">
                                <a href="#" class="badge thumb-reset" onclick="resetThumb( event);">Reset</a>

                                {{Form::file('thumb',['type'=>'file','id'=>'thumb',
                                'name'=>'thefile',

                                'class'=>'hidden-input-file','onchange'=>'readUrl(this);',
                                'data-validation' => 'required',
                                'data-validation-allowing' => 'jpg|png',
                                'data-validation-error-msg' => trans('admin.errors.errors_photo')])}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

                        <script type="text/javascript">
                            tinymce.init({
                                selector:'textarea',
                                plugins :'link code',
                                directionality :"rtl"
                                /* menubar :false,*/
                                /* toolbar: 'undo redo | cut copy paste'*/
                            });
                        </script>
                        <div class="form-group">
                            <select class="form-control" name="trans_lng" id="trans_lng" >

                                <option >{{trans('admin.articles.save_lng')}}</option>

                                <option value="1">{{trans('admin.articles.trans_lng_ar')}}</option>


                                <option value="2">{{trans('admin.articles.trans_lng_fr')}}</option>


                                <option value="3">{{trans('admin.articles.trans_lng_en')}}</option>

                            </select>

                        </div>

                        {{Form::textarea('body','',[
                                'id'=>'body',
                                'data-validation' => 'required',
                                'data-validation-error-msg' => trans('admin.errors.errors_body'),
                                'class'=>'form-control'

                       ])}}
                        <span class="errorbody label label-danger hidden"></span>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <hr>
                        <button type="submit" id="btn-save-article" class="btn btn-primary"  > {{trans('admin.articles.add_articles_ok')}}</button>
                    </div>
                </div>
            </form>
        @endif

        @if($loc=="fr" or $loc=="en")
            <form method="post" name="form-article-add" id="form-article-add" enctype="multipart/form-data" action="{{URL::route('admin.article.store')}}">
                {{csrf_field()}}
                <div class="row form-add-top">
                    <div class="col-sm-8 col-xs-12">
                        <div class="box-infos-search">
                            <section class="content-header box-infos-header">
                                <span class="content-title"><i class="fa fa-home"></i> </span>
                                <a href="#" class="show_ok" style="color: #fff">

                                </a>
                            </section>

                            <section class="content-header box-infos-errors lng_prb hidden">
                                <span class="content-title"><i class="fa  fa-exclamation-circle"></i> </span>
                                <a href="#" class="lng-err" style="color: #000">

                                </a>
                            </section>
                            <div class="box-infos">

                                <input type="hidden" name="box-infos-id" class="box-infos-id">
                                <h3 class="box-infos-name"></h3>
                                <p class="box-infos-city"></p>
                                <p class="box-infos-address"></p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="box-infos-search">
                            <section class="content-header box-infos-header">
                                <span class="content-title"><i class="fa fa-image"></i> الصورة</span>
                                <a href="#" class="btn btn-default btn-search" onclick="triggerInputFile('thumb', event);">
                                    <i class="fa fa-search"></i>
                                </a>

                            </section>
                            <div class="box-infos text-center">
                                <img class="thumb-preview" src="{{asset('admin')}}/img/thumbs/articles/no_thumb.jpg">
                                <a href="#" class="badge thumb-reset" onclick="resetThumb( event);">Reset</a>

                                {{Form::file('thumb',['type'=>'file','id'=>'thumb',
                                'name'=>'thefile',

                                'class'=>'hidden-input-file','onchange'=>'readUrl(this);',
                                'data-validation' => 'required',
                                'data-validation-allowing' => 'jpg|png',
                                'data-validation-error-msg' => trans('admin.errors.errors_photo')])}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

                        <script type="text/javascript">
                            tinymce.init({
                                selector:'textarea',
                                plugins :'link code'

                                /* menubar :false,*/
                                /* toolbar: 'undo redo | cut copy paste'*/
                            });
                        </script>
                        <div class="form-group">
                            <select class="form-control" name="trans_lng" id="trans_lng" >

                                <option >{{trans('admin.articles.save_lng')}}</option>

                                <option value="1">{{trans('admin.articles.trans_lng_ar')}}</option>


                                <option value="2">{{trans('admin.articles.trans_lng_fr')}}</option>


                                <option value="3">{{trans('admin.articles.trans_lng_en')}}</option>

                            </select>

                        </div>


                        {{Form::textarea('body','',[
                                'id'=>'body',
                                'data-validation' => 'required',
                                'data-validation-error-msg' => trans('admin.errors.errors_body'),
                                'class'=>'form-control'

                       ])}}
                        <span class="errorbody label label-danger hidden"></span>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <hr>
                        <button type="submit" id="btn-save-about" class="btn btn-primary"  >حفظ</button>
                    </div>
                </div>
            </form>
        @endif
    </section>

@endsection

@section('script_master')

    @include('admin.about.java.about')

@endsection



