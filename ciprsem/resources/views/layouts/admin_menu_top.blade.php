<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{URL::route('admin.home')}}" class="logo">
                <i class="md md-terrain"></i>
                <span>CIPRSEM </span>
            </a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <form class="navbar-form pull-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                    </div>
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </form>

                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                            <i class="md md-language"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                            <li class="text-center notifi-title">Languages</li>
                            <li class="list-group">
                                <!-- list item-->

                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                    <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}" class="list-group-item">
                                        <div class="media">

                                            <div class="pull-left">
                                                <em class="md md-language fa-2x text-info"></em>
                                            </div>

                                            <div class="media-body clearfix">
                                                <div class="media-heading"> {{ $properties['native'] }} </div>
                                            </div>

                                        </div>

                                    </a>

                                @endforeach
                            </li>
                        </ul>
                    </li>





                    <li class="dropdown hidden-xs">
                        <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                            <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">{{$translated}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg">
                            <li class="text-center notifi-title">Notification</li>
                            <li class="list-group">
                                <!-- list item-->
                                <a href="javascript:void(0);" class="list-group-item">
                                    <div class="media">
                                        <div class="pull-left">
                                            <em class="md  md-mood md-2x text-info"></em>
                                        </div>
                                        <div class="media-body clearfix">
                                            <div class="media-heading">Ciprsem</div>
                                            <p class="m-0">
                                                <small>Welcom {{Auth::user()->name}}</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>


                                <a href="javascript:void(0);" class="list-group-item">
                                    <small>See all notifications</small>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                    </li>
                    <li class="hidden-xs">
                        <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                            @if(Auth::user()->avatar)
                                <img class="img-circle" src="{{asset('admin/img/avatar'.'/'.Auth::user()->avatar)}}">
                            @else
                                <img class="img-circle" src="{{asset('admin')}}/img/avatar/no_avatar.png" />
                            @endif

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::route('admin.users.profile')}}"><i class="md md-face-unlock"></i> Profile</a></li>
                            <li><a href="{{URL::route('admin.settings')}}"><i class="md md-settings"></i> Settings</a></li>
                            <li><a href="{{URL::route('logout.admin')}}"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->