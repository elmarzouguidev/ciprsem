@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{trans('admin.permission.permission_users')}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table class="table table-bordered" style="direction: ltr">
                                        <thead>
                                        <tr>

                                            <th>{{trans('admin.tables.t_username')}}</th>
                                            <th>{{trans('admin.tables.t_email')}}</th>
                                            <th>{{trans('admin.tables.t_avatar')}}</th>
                                            <th>{{trans('admin.permission.permission_select')}}</th>
                                            <th>{{trans('admin.permission.add_permission')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admins as $admin)
                                            <tr class="{{$admin->id == Auth::user()->id ?'active':''}}">
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>
                                                    @if($admin->avatar)
                                                        <img class="thumb-lg img-circle" src="{{asset('admin/img/avatar'.'/'.$admin->avatar)}}">
                                                    @else
                                                        <img class="thumb-lg img-circle" src="{{asset('admin')}}/img/avatar/no_avatar.png">
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{URL::route('admin.add_roles')}}" method="post" id="add_permission_to_user">
                                                        {{csrf_field()}}

                                                        <input type="hidden" name="email" value="{{$admin->email}}">

                                                        @foreach($roles as $role)

                                                            <div class="checkbox {{$role->name =='Global-Admin'?'checkbox-danger':'checkbox-info '}} checkbox-circle ">
                                                                @if(Auth::user()->HasRole('Global-Admin') )

                                                                    <input type="checkbox" {{$admin->HasRole($role->name) ?'checked':''}} name="{{$role->name}}">

                                                                @else

                                                                    <input type="checkbox"  {{$admin->HasRole($role->name) ?'checked':''}} name="{{$role->name}}">
                                                                @endif
                                                                <label >{{$role->name}}</label>
                                                            </div>
                                                    @endforeach

                                                </td>

                                                <td>
                                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-5">
                                                        <i class="fa fa-floppy-o">
                                                            {{trans('admin.permission.add_permission')}}
                                                        </i>
                                                    </button>
                                                </td>
                                                </form>
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
        </div> <!-- End Row -->
    </div>

@endsection
@section('script_master')



@endsection