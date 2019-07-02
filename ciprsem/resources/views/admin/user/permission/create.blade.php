@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <!-- Basic example -->
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{trans('admin.permission.add_permission')}}</h3></div>
                    <div class="panel-body">
                        <p id="is_created" class="hidden text-center" style="color: blue"></p>
                        <p id="is_err" class="hidden text-center" style="color: blue"></p>
                        <form id="add-permission" role="form" method="post" action="{{URL::route('admin.roles.save')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="role">Role name</label>

                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Role description</label>

                                <textarea id="description" name="description" class="form-control "></textarea>

                            </div>

                            <button type="submit" class="btn btn-purple waves-effect waves-light">save</button>
                        </form>
                    </div><!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col-->
        </div> <!-- End row -->
    </div>

@endsection
@section('script_master')

    @include('admin.user.java.add_permission')

@endsection
