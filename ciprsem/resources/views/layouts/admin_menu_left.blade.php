<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                @if(Auth::user()->avatar)
                    <img class="thumb-md img-circle" src="{{asset('admin/img/avatar'.'/'.Auth::user()->avatar)}}">
                @else
                    <img class="thumb-md img-circle" src="{{asset('admin')}}/img/avatar/no_avatar.png" />
                @endif
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::route('admin.users.profile')}}"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="{{URL::route('admin.settings')}}"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="{{URL::route('logout.admin')}}"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0">{{Auth::user()->job}}</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{URL::route('admin.home')}}" class="waves-effect @if (Request::is(LaravelLocalization::getCurrentLocale().'/admin/home')) {{'active'}} @endif">
                        <i class="md md-home"></i>
                        <span> {{trans('admin.home.home')}} </span>
                    </a>
                </li>

                <li class="has_sub ">
                    <a href="#" class="waves-effect @if (Request::is(LaravelLocalization::getCurrentLocale().'/admin/article')) {{'active'}} @endif ">
                        <i class="md  md-content-copy"></i>
                        <span>
                            {{trans('admin.articles.article')}}
                        </span>
                        <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li class="">
                            <a href="{{URL::route('admin.article.create')}}" class="waves-effect @if (Request::is(LaravelLocalization::getCurrentLocale().'/admin/article/create')) {{'active'}} @endif">
                                {{trans('admin.articles.add_articles')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.article.all')}}" >
                                {{trans('admin.articles.article')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.article.trans')}}" class="waves-effect @if (Request::is(LaravelLocalization::getCurrentLocale().'/admin/article/trans')) {{'active'}} @endif">
                                {{trans('admin.articles.trans_article')}}
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-content-copy"></i> <span> {{trans('admin.articles.activities')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{URL::route('admin.activities.create')}}">
                                {{trans('admin.articles.add_activities')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.activities.all')}}">
                                {{trans('admin.articles.activities')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.activities.trans')}}">
                                {{trans('admin.articles.trans_activities')}}
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md   md-video-collection"></i> <span> {{trans('admin.videos.videos')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{URL::route('admin.videos.create')}}">
                                {{trans('admin.videos.add_video')}}
                            </a>
                        </li>

                        <li>
                            <a href="{{URL::route('admin.videos.all')}}">
                                {{trans('admin.videos.videos')}}
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md    md-crop-original"></i> <span> {{trans('admin.photos.photos')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{URL::route('admin.photos.all')}}">
                                {{trans('admin.photos.photos')}}
                            </a>
                        </li>

                    </ul>
                </li>
                <hr>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-settings-input-composite"></i> <span> {{trans('admin.categories.categories')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{URL::route('admin.categories.create')}}">
                                {{trans('admin.categories.categories')}}
                            </a>
                        </li>

                    </ul>
                </li>
                <hr>


                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-group"></i> <span> {{trans('admin.admins.admins')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">

                        <li>
                            <a href="{{URL::route('admin.users.add')}}">
                                {{trans('admin.admins.add_admin')}}
                            </a>
                        </li>

                        <li>
                            <a href="{{URL::route('admin.users.all')}}">
                                {{trans('admin.admins.admins_lists')}}
                            </a>
                        </li>

                    </ul>
                </li>
                <hr>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-warning"></i> <span> {{trans('admin.permission.permission_all')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{URL::route('admin.roles.admins')}}">
                                {{trans('admin.permission.permission_all')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.roles')}}">
                                {{trans('admin.permission.permission_users')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.roles.add')}}">
                                {{trans('admin.permission.add_permission')}}
                            </a>
                        </li>

                    </ul>
                </li>
                <hr>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-settings"></i> <span> {{trans('admin.settings.settings')}} </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{URL::route('admin.ciprsem.settings')}}">
                                {{trans('admin.settings.settings')}}
                            </a>
                        </li>

                        <li>
                            <a href="{{URL::route('admin.system.control')}}">
                                {{trans('admin.system.system')}}
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->