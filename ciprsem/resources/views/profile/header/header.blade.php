
@if($profile)
    <header id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('profiles/abdo/img'.'/'.$profile->background)}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cipresm_show">
                        <div class="cipresm_show_content animate-box" data-animate-effect="fadeIn">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--<img src="{//asset('profiles/abdo/img'.'/'.$profile->photo)}}" alt="{//Auth::user()->name}}">-->

    <div id="devscript_cipresm-explore" class="devscript_cipresm-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center devscript_cipresm-heading">
                    <p>

                        {{$profile->fullname}}

                    </p>

                </div>
            </div>
        </div>

    </div>
@else
    <header id="devscript_cipresm-header" class="devscript_cipresm-cover" role="banner" style="background-image:url({{asset('images')}}/bg-p.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="cipresm_show">
                        <div class="cipresm_show_content animate-box" data-animate-effect="fadeIn">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="devscript_cipresm-explore" class="devscript_cipresm-bg-section">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3 text-center devscript_cipresm-heading">
                    <p>

                        No thing

                    </p>

                </div>
            </div>
        </div>

    </div>
@endif

