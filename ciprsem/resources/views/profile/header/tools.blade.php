<div id="gtco-features" class="border-bottom" style="margin-top: 80px">
    <div class="gtco-container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
                    <h3><a href="{{URL::route('personel.about',Auth::user()->name)}}">{{trans('home.prof_account')}}</a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-tablet"></i>
						</span>
                    <h3><a href="#" data-toggle="modal" data-target="#Video">{{trans('home.prof_add_video')}}</a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-image"></i>
						</span>
                    <h3><a href="#" data-toggle="modal" data-target="#Photo">{{trans('home.prof_add_photo')}}</a></h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-pencil"></i>
						</span>
                    <h3>
                        <a href="{{URL::route('article.create')}}">{{trans('home.prof_add_article')}}</a>


                    </h3>


                </div>

            </div>

            <!---------------------------------------------------------------------------------------->

        </div>
    </div>
</div>
