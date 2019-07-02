<div id="gtco-features" class="border-bottom">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-new-window"></i>
						</span>
                    <h3><a href="{{URL::route('admin.login')}}" target="_blank">{{trans('home.prof_admin')}}</a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-tablet"></i>
						</span>
                    <h3><a href="#" data-toggle="modal" data-target="#Video">{{trans('home.prof_list_v')}}</a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-image"></i>
						</span>
                    <h3><a href="{{URL::route('photo.all')}}" >{{trans('home.prof_photos')}}</a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">

                            <i>{{count($articles_shod)}}</i>
						</span>
                    <h3><a href="{{URL::route('article.show.all.need.translated')}}">{{trans('home.prof_article_trs')}}</a></h3>
                </div>
            </div>
            <!---------------------------------------------------------------------------------------->

        </div>
    </div>
</div>
