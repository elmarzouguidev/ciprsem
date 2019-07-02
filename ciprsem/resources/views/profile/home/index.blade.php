@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')

    @include('profile.header.tools')
    @include('profile.header.info')




    <!-- Modal -->
    <div id="Video" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('home.prof_add_video')}}</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>['video.store'],'method'=>'post','class'=>'form-horizontal']) }}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                        {{ Form::text('title',null,['class'=>'form-control','id'=>'title','placeholder'=>trans('home.prof_form_title')]) }}

                    </div>
                    <div class="form-group{{ $errors->has('linke') ? ' has-error' : '' }}">

                        {{ Form::text('linke',null,['class'=>'form-control','id'=>'linke','placeholder'=>trans('home.prof_form_linke')]) }}

                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                        {{ Form::textarea('body',null, array('id'=>'body')) }}

                    </div>
                    <div class="form-group">

                        {{ Form::submit(trans('home.prof_add'),['class'=>'btn btn-primary']) }}

                    </div>
                    {{ Form::close() }}
                    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

                    <script type="text/javascript">
                        tinymce.init({
                            selector:'textarea',
                            plugins :'link code',
                            menubar :false,
                            /* toolbar: 'undo redo | cut copy paste'*/
                        });
                    </script>
                </div>
            </div>

        </div>
    </div>




    <!-- Modal -->
    <div id="Photo" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{trans('home.prof_add_photo')}}</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route'=>['photo.store'],'method'=>'post','class'=>'form-horizontal','files'=> true]) }}

                    <div class="form-group{{ $errors->has('linke') ? ' has-error' : '' }}">

                        {{ Form::text('title',null,['class'=>'form-control','id'=>'title','placeholder'=>trans('home.prof_form_photo_title')]) }}

                    </div>
                    <div class="form-group">

                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach

                        </select>

                    </div>

                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail"></div>
                        <div id="arab_text">
                            <span class="btn btn-file btn-success"><span class="fileupload-new">{{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists">{{trans('home.prof_form_photo_select')}}</span><input type="file" name="thefile" required="required"></span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
                        </div>
                    </div>


                    <div class="form-group">

                        {{ Form::submit(trans('home.prof_add'),['class'=>'btn btn-primary']) }}

                    </div>
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>
@endsection