@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')

    <div id="gtco-features" class="border-bottom">
        <div class="gtco-container">
            <div class="row">

                <div class="need_tr">
                    @if(count($fr)>0)

                        <li><p> هدا المقال تلزمه الترجمة الى اللغة الفرنسية</p></li>
                    @endif
                    @if(count($en)>0)
                        <li> <p> هدا المقال تلزمه الترجمة الى اللغة الانجليزية</p></li>
                    @endif
                    @if(count($ar)>0)
                        <li> <p> هدا المقال تلزمه الترجمة الى اللغة العربية</p></li>
                    @endif
                </div>

                <!---------------------------------------------------------------------------------------->

            </div>
        </div>
    </div>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        tinymce.init({
            selector:'textarea',
            plugins :'link code',
            menubar :false,
            /* toolbar: 'undo redo | cut copy paste'*/
        });
    </script>


    <div class="container" style="padding-top: 100px">
        @if($loc=='fr')
            @foreach($articles_edits as $articles_edit)
                {{ Form::open(['route'=>['article.translated',$articles_edit->id],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::text('title',$articles_edit->title_fr,['class'=>'form-control','id'=>'title']) }}

                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                    {{ Form::textarea('body', $articles_edit->body_fr, array('id'=>'body')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit('التعديل',['class'=>'btn btn-primary']) }}

                    </div>
                </div>
                {{ Form::close() }}
            @endforeach
        @endif
        @foreach($articles_edits as $articles_edit)
            @if($loc=='en')
                {{ Form::open(['route'=>['article.translated',$articles_edit->id],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::text('title',$articles_edit->title_en,['class'=>'form-control','id'=>'title']) }}

                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                    {{ Form::textarea('body', $articles_edit->body_en, array('id'=>'body')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit('التعديل',['class'=>'btn btn-primary']) }}

                    </div>
                </div>
                {{ Form::close() }}

            @endif
        @endforeach
        @if($loc=='ar')
            @foreach($articles_edits as $articles_edit)
                {{ Form::open(['class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    {{ Form::text('title',$articles_edit->title_ar,['class'=>'form-control','id'=>'title']) }}

                    @if ($errors->has('title'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">

                    {{ Form::textarea('body', $articles_edit->body_ar, array('id'=>'body')) }}

                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        {{ Form::submit('التعديل',['class'=>'btn btn-primary','id'=>'ok']) }}

                    </div>
                </div>
                {{ Form::close() }}
            @endforeach
        @endif
    </div>



    <script>

        $(document).ready(function () {
            var email = $('#title').val();

            var password = $('#password').val();
            var tok = '{{Session::token()}}';

            $('#ok').click(function () {

                console.log(email);
               /* $.ajax({

                    method: 'POST',
                    url: '',

                    data: { email:email , password:password, _token:tok }


                })
                        .done(function(msg){

                            console.log(msg['message']);
                        });*/
            });


        });
    </script>






@endsection