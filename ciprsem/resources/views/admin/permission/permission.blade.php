@extends('layouts.admin')

@section('content')


    <section>
        {{csrf_field()}}
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="home-wrapper">
                        <h1 class="icon-main text-danger"><i class="md md-terrain"></i></h1>
                        <h1 class="home-text text-uppercase">
                            {{trans('admin.permission.permission')}}
                        </h1>
                        <h4>{{trans('admin.permission.permission_admin')}}</h4>

                    </div>
                </div>
            </div>
    </section>

@endsection



