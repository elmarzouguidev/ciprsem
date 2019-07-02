
<nav class="devscript_cipresm-nav " role="navigation">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-left">
                    <ul class="devscript_cipresm-social lng"  >
                        <li class="cipresm_menu_dropdown">
                            <a href="" style="font-size: 20px"><span class="icon-globe2"></span></a>
                            <ul class="dropdown " id="lng_nav">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li style="margin: 0; padding: 0" >
                                        <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @if(!Auth::guest())

                            <li class=""><a href="{{URL::route('profile')}}"><span>{{trans('home.welcom')}}  {{Auth::user()->name}}</span></a></li>
                        @endif

                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div  class="cipresm_menu_master">

        <div class="container">
            <div class="row">
                <a id="logo_ciprsem" class="logo" href="#"></a>

                <div class="col-xs-11 text-right cipresm_menu_primary">

                    <ul>
                        <li class=""><a href="{{URL::route('home')}}">{{trans('home.home')}}</a></li>
                        <li class="cipresm_menu_dropdown">
                            <a href="">{{trans('home.articles')}}</a>
                            <ul class="dropdown">
                                <li><a href="">{{trans('home.witre')}}   </a></li>
                                <li><a href="">{{trans('home.kisas')}}   </a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('news')? "active" : ""}} "><a href="{{URL::route('news')}}">{{trans('home.news')}}</a></li>
                        <li class="{{ Request::is('activities')? "active" : ""}}"><a href="{{URL::route('activities')}}">{{trans('home.activity')}}</a></li>
                        <li class="{{ Request::is('photos')? "active" : ""}}"><a href="{{URL::route('photos')}}">{{trans('home.photos')}}</a></li>
                        <li class="{{ Request::is('videos')? "active" : ""}}"><a href="{{URL::route('videos')}}">{{trans('home.videos')}}</a></li>
                        <li class="cipresm_menu_dropdown">
                            <a href="">{{trans('home.about')}}</a>
                            <ul class="dropdown">
                                <li><a href="{{URL::route('about.us')}}">{{trans('home.about_us')}}  </a></li>
                                <li><a href="{{URL::route('contact.us')}}">{{trans('home.contact_us')}}  </a></li>

                                <li><a href="{{URL::route('profiles')}}">{{trans('home.team')}}</a></li>
                            </ul>
                        </li>

                        @if(Auth::guest())
                            <li id="ciprsem_login" class="cipresm_button"><a href="{{URL::route('login')}}"><span class=" ">{{trans('home.conn')}}</span></a></li>
                        @else
                            <li class="cipresm_button"><a href="{{URL::route('logout')}}"><span>{{trans('home.logout')}}</span></a></li>
                        @endif

                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>
<script type="text/javascript">
    (function($) {
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop() > 50) {
                    $('.cipresm_menu_master').addClass('cipresm_menu_master_src');
                    $('#logo_ciprsem').removeClass('logo');
                    $('#logo_ciprsem').addClass('logo_small');



                }
                else
                {
                    $('.cipresm_menu_master').removeClass('cipresm_menu_master_src');

                    $('#logo_ciprsem').addClass('logo');
                    $('#logo_ciprsem').removeClass('logo_small');
                }

                if ($(this).width() < 768) {
                    $('.cipresm_menu_master').removeClass('cipresm_menu_master_src');
                    $('#logo_ciprsem').removeClass('logo');


                }
            });

        });
    })(jQuery);
</script>