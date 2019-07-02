@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')
    <div id="gtco-features" class="border-bottom">
        <div class="gtco-container">
            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-pencil"></i>
						</span>
                        <h3><a href="{{URL::route('article.create')}}">اضف مقال</a></h3>
                    </div>
                </div>
                <!---------------------------------------------------------------------------------------->

            </div>
        </div>
    </div>





    <div class="container">

        <form class="form-horizontal" role="form" method="POST" action="{{ route('activities.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-preview thumbnail"></div>
                <div id="arab_text">
                    <span class="btn btn-file btn-success"><span class="fileupload-new">حدد مكان الصورة</span><span class="fileupload-exists">رفع الصورة</span><input type="file" name="thefile" required="required"></span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حدف الصورة</a>
                </div>
            </div>

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                <input id="title" type="text" class="form-control" name="title" value="" required autofocus>

                @if ($errors->has('title'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('linke') ? ' has-error' : '' }}">

                <input id="linke" type="text" class="form-control" name="linke" value="" placeholder="Video lien exemple : Youtube" required autofocus>

                @if ($errors->has('linke'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                @endif

            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">


                {{ Form::textarea('body', null, array('id'=>'body','cols'=>'185')) }}


            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">

                    <button type="submit" class="btn btn-primary">  أظافة</button>

                </div>
            </div>
        </form>
    </div>

    <!--<script type="text/javascript">
        CKEDITOR.replace( 'body',{
            language: '',
            uiColor: '#FFB400'
        } );
    </script>-->


    <div class="col-lg-12 pull-left">

    </div>





@endsection