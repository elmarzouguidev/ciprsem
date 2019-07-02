<form name="form-article-edit" id="form-article-edit" class="form-horizontal" role="form" action="{{URL::route('admin.article.edit.save',$articles_edit->id)}}" method="post" enctype="multipart/form-data">
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
        <div class="fileupload-preview thumbnail">

            <img src="{{asset('c_images/articles'.'/'.$articles_edit->pic)}}">
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
            <input type="text" name="title" id="title" class="form-control" value="{{$articles_edit->title_en}}" style="direction: ltr">
            <span class="errortitle label label-danger hidden"></span>
        </div>

    </div>

    <div class="form-group">

        <div class="col-md-10">

            {{Form::textarea('body',$articles_edit->body_en,['id'=>'body'])}}

            <span class="errorbody label label-danger hidden"></span>
        </div>

    </div>

    <div class="form-group ">
        <hr>
        <button type="submit" id="btn-save-article" class="btn btn-primary"  > {{trans('admin.articles.update_ok')}}</button>
    </div>

</form>