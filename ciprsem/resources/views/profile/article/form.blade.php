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

<div class="col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 ">

    <form id="add_ar" class="form-horizontal" method="post"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="fileupload fileupload-new  " data-provides="fileupload">
            <div class="fileupload-preview thumbnail"></div>
            <div id="arab_text">
                <span class="btn btn-file btn-success"><span class="fileupload-new">{{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists">{{trans('home.prof_form_photo_select')}}</span><input type="file" name="thefile" id="thefile"></span>
                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
            </div>

            <span class="errorthefile label label-danger hidden"></span>
        </div>
        <div class="form-group">
            <label for="sel1">{{trans('home.prof_creat_cats')}}</label>
            <select class="form-control" name="cats" id="cats">
                @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

            <input id="title" type="text" class="form-control" name="title" value="">

            <span class="errortitle label label-danger hidden"></span>

        </div>

        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

            {{ Form::textarea('body', null, array('id'=>'body','class'=>'body')) }}


            <span class="errorbody label label-danger hidden"></span>
        </div>
        <div class="form-group form">
            <div class="col-md-8 col-md-offset-4">

                <button type="submit" class="btn btn-primary save">  {{trans('home.prof_add_article')}}</button>

            </div>
        </div>
    </form>
</div>