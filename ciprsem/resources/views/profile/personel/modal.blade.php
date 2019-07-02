@if($profile)
<div id="myback" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                {{ Form::open(['route'=>['about.photo.ground.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal','files'=>true]) }}
                <div class="form-group">

                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail">
                            <img src="{{asset('profiles/abdo/img'.'/'.$profile->background)}}">
                        </div>
                        <div class="col-lg-4 col-lg-offset-4" >
                            <span class="btn btn-file btn-success"><span class="fileupload-new"> {{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists">{{trans('home.prof_form_photo_select')}}</span><input type="file" name="thefile" required="required"></span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-lg-offset-4">
                        {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary btn-sm ']) }}
                    </div>
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>

</div>






<!-- Modal -->
<div id="Setting" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{trans('home.prof_about_info')}}</h3>
            </div>

            <div class="modal-body">
                {{ Form::open(['route'=>['info.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal']) }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    {{ Form::text('email',$profile->gmail,['class'=>'form-control','id'=>'email','placeholder'=>'address email']) }}

                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                    {{ Form::text('facebook',$profile->facebook,['class'=>'form-control','id'=>'facebook','placeholder'=>'facebook']) }}

                </div>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                    {{ Form::text('phone',$profile->number_phone,['class'=>'form-control','id'=>'phone','placeholder'=>'number phone']) }}

                </div>
                <label> address</label>
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

                    {{ Form::text('address',$profile->address,['class'=>'form-control','id'=>'address','placeholder'=>'address']) }}

                </div>

                <div class="form-group">

                    {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary']) }}

                </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>
</div>



<div id="myphoto" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-body">
                {{ Form::open(['route'=>['about.photo.store',Auth::user()->name],'method'=>'post','class'=>'form-horizontal','files'=>true]) }}
                <div class="form-group">

                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail">
                            <img src="{{asset('profiles/abdo/img'.'/'.$profile->photo)}}">
                        </div>
                        <div class="col-lg-4 col-lg-offset-4" >
                            <span class="btn btn-file btn-success"><span class="fileupload-new">  {{trans('home.prof_form_photo_link')}}</span><span class="fileupload-exists"> {{trans('home.prof_form_photo_select')}}</span><input type="file" name="thefile" required="required"></span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{{trans('home.prof_form_photo_del')}}</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-4 col-lg-offset-4">
                        {{ Form::submit(trans('home.prof_about_change'),['class'=>'btn btn-primary btn-sm ']) }}
                    </div>
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>

</div>

@endif