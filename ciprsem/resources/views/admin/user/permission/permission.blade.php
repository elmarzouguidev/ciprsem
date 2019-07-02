
@extends('layouts.admin')

@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{trans('admin.categories.categories')}}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive" id="list_categories">
                                        <table class="table table-bordered" >
                                            <thead>
                                            <tr>
                                                <th>Role name</th>
                                                <th>Role User Count</th>
                                                <th>Role User</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($roles as $role)
                                                <tr class="role{{$role->id}}">
                                                    <td>{{$role->name}}</td>
                                                    <td></td>
                                                    <td>
                                                        @foreach($role->admins() as $admin)
                                                            <p>{{$admin->name}}</p>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- End row -->
    </div>

@endsection

@section('script_master')


@endsection