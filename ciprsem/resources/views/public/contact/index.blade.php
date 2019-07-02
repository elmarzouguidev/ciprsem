@extends('layouts.app')
@section('title',trans('home.contact_us'))
@section('content')

    <section id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/home.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cipresm_show">
                        <div class="cipresm_show_content animate-box" data-animate-effect="fadeIn">
                            <!--    <h2>تعرف علينا من خلال الفيديو التعريفي</h2>-->
                            <p>
                                <!--<a class="btn btn-primary btn-lg popup-vimeo btn-video" href="https://www.youtube.com/watch?v=-oHdK3FM6mo">
                                    <i class="icon-play"></i> شاهد الفيديو
                                </a>-->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="devscript_cipresm-explore" class="devscript_cipresm-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center devscript_cipresm-heading">
                    <p>{{trans('home.title_cip')}}</p>
                </div>
            </div>
        </div>

    </div>

    <div id="devscript_cipresm-contact" style="margin-top: 180px">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box" style="direction: ltr">

                    <div class="devscript_cipresm-contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
                            <li class="phone"><a href="tel://1234567920">+ 0000000000</a></li>
                            <li class="email"><a href="mailto:info@yoursite.com">info@info.com</a></li>

                        </ul>
                    </div>

                </div>
                <div class="col-md-6 animate-box">
                    <h3>{{trans('home.contact_us')}}</h3>
                    <span class="send label label-success hidden"></span>
                    <form action="{{URL::route('contact.us.ok')}}" method="post">
                        {{csrf_field()}}
                        <div class="row form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <!-- <label for="fname">First Name</label> -->
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{trans('home.y_name')}}">
                            </div>
                            <span class="errorname label label-danger hidden"></span>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" id="email" name="email" class="form-control" placeholder="{{trans('home.y_mail')}}">
                            </div>
                            <span class="erroremail label label-danger hidden"></span>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="message">Message</label> -->
                                <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="{{trans('home.y_message')}}"></textarea>
                                <span class="errormessage label label-danger hidden"></span>
                            </div>
                        </div>


                    </form>
                    <div class="form-group form">
                        <input type="submit" value="{{trans('home.y_send')}}" class="btn btn-primary send">
                    </div>
                </div>
            </div>

        </div>
    </div>

  <section id="devscript_cipresm-trusted" data-section="trusted">
        <div class="devscript_cipresm-trusted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center to-animate-2">
                        <!--<h3 class="to-animate">المساندون الرسميون</h3>-->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-6 col-sm-offset-0 col-md-offset-1">
                        <div class="partner-logo to-animate-2">
                            <img src="{{asset('images')}}/" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{asset('images')}}/" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{asset('images')}}/" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-6">
                        <div class="partner-logo to-animate-2">
                            <img src="{{asset('images')}}/" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="partner-logo to-animate-2">
                            <img src="{{asset('images')}}/" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script>
        $('.form').on('click','.send',function(){
            //console.log($('#name').val());
            $('form').on('keyup',function () {
                $('.errorname').addClass('hidden');
                $('.erroremail').addClass('hidden');
                $('.errormessage').addClass('hidden');
            });

            $.ajax({
                type:'POST',
                url:'{{URL::route('contact.us.ok')}}',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'name':$('#name').val(),
                    'email':$('#email').val(),
                    'message':$('#message').val()
                },
                success:function (data) {
                    if (data.errors) {

                        if (data.errors.name) {
                            $('.errorname').removeClass('hidden');
                            $('.errorname').text(data.errors.name);
                        }
                        if (data.errors.email) {
                            $('.erroremail').removeClass('hidden');
                            $('.erroremail').text(data.errors.email);
                        }
                        if (data.errors.message) {
                            $('.errormessage').removeClass('hidden');
                            $('.errormessage').text(data.errors.message);
                        }

                    }else {
                        //console.log(data.success);
                        if(data.success) {
                            $('.send').removeClass('hidden');
                            $('.send').text(data.success);
                            //  $('.send').te
                        }
                    }
                }
            });

        });


    </script>
@endsection