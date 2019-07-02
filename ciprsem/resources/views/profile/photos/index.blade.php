@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')

    <section id="recent-works" style="padding-top: 200px">
        <div class="container">
            <div class="center wow fadeInDown">
            </div>

            <div class="row">
                @foreach($photos as $photo)
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="{{asset('profiles/images'.'/'.$photo->photo)}}" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#">{{$photo->title}}</a> </h3>
                                <p>{{$photo->desc}}</p>
                                <a class="preview" href="{{asset('profiles/images'.'/'.$photo->photo)}}" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                <a href="{{URL::route('photo.delete',$photo->id)}}">{{trans('home.prof_form_photo_del')}}<i class="fa fa-trash-o"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->

    <script>
       $(document).ready(function(){
           //Pretty Photo
           $("a[rel^='prettyPhoto']").prettyPhoto({
               social_tools: false
           });
       });
    </script>
@endsection