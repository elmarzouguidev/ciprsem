@extends('layouts.admin')
@section('style')
    <link href="{{ asset('admin/assets/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
@endsection
@section('content')

    <div class="container">

        <div class="row">
            <div class="panel-heading col-md-8">
                <span class="show_ok label label-danger "></span>
                <h3 class="panel-title">{{trans('admin.photos.add_photo')}}</h3>
                {{ Form::open(['route'=>['admin.photos.store'],'method'=>'post','class'=>'form-horizontal','files'=> true]) }}

                <div class="form-group{{ $errors->has('linke') ? ' has-error' : '' }}">

                    {{ Form::text('title',null,['class'=>'form-control','id'=>'title','placeholder'=>'عنوان الصورة']) }}

                </div>
                <div class="form-group">

                    <select name="category" class="form-control">
                        @foreach($cats as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>

                </div>

                <div class="fileupload fileupload-new" data-provides="fileupload">

                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">

                        <img src="{{asset('admin')}}/demoUpload.jpg" alt="" />
                    </div>
                    <div id="arab_text">
                        <span class="btn btn-file btn-success"><span class="fileupload-new">حدد مكان الصورة</span><span class="fileupload-exists">رفع الصورة</span><input type="file" name="thefile" required="required"></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حدف الصورة</a>
                        {{ Form::submit('اظف',['class'=>'btn btn-primary']) }}
                    </div>
                </div>


                <div class="form-group">



                </div>
                {{ Form::close() }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="portfolioFilter">
                    <a href="#" data-filter="*" class="current">All</a>

                    @foreach($cats as $cat)
                        <a href="#" data-filter=".{{$cat->name}}">{{$cat->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row port">
            <div class="portfolioContainer">

                @foreach($photos as $article)

                    <div class="col-sm-6 col-lg-3 photos{{$article->id}} col-md-4 {{$article->category->name}}">
                        <div class="gal-detail thumb">
                            <a href="{{asset('c_images/photos'.'/'.$article->photo)}}" class="image-popup" title="">
                                <img src="{{asset('c_images/photos'.'/'.$article->photo)}}" class="thumb-img" alt="">
                            </a>
                            <h4>{{$article->title}}</h4>
                            <a data-id="{{$article->id}}" id="{{$article->id}}" data-token="{{csrf_token()}}" class="delete_photo on-default remove-row">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>

                    </div>

                @endforeach

            </div>
        </div> <!-- End row -->

    </div> <!-- container -->

@endsection

@section('script_link')

    <script src="{{ asset('admin/assets/gallery/isotope.js') }}"></script>
    <script src="{{ asset('admin/assets/magnific-popup/magnific-popup.js') }}"></script>
@endsection

@section('script_master')

    @include('admin.photos.java.photo')
@endsection

