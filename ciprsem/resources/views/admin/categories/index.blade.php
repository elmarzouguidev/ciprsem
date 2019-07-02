
@extends('layouts.admin')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Basic Tables</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Moltran</a></li>
                    <li><a href="#">Data Tables</a></li>
                    <li class="active">Basic Tables</li>
                </ol>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="show_ok label label-danger "></span>
                        <h3 class="panel-title">{{trans('admin.categories.add_category')}}</h3>
                        {{ Form::open(['route'=>['admin.categories.store'],'method'=>'post','class'=>'form-horizontal','id'=>'form-category-add']) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            {{ Form::text('name',null,['class'=>'form-control','id'=>'name']) }}

                        </div>
                        <div class="form-group">

                            <select name="category_type" id="category_type" class="form-control">

                                <option value="1">articles</option>
                                <option value="2">photos</option>
                                <option value="3">vedios</option>

                            </select>

                        </div>
                        <div class="form-group">

                            {{ Form::submit('اظف',['class'=>'btn btn-primary']) }}

                        </div>
                        {{ Form::close() }}
                    </div>

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
                                                <th>Category name</th>
                                                <th>Category type</th>
                                                <th>Category children</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($categories as $category)
                                                <tr class="categories{{$category->id}}">
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->category_of}}</td>
                                                    <td>{{$category->photos()->count()}}</td>
                                                    <td class="actions">
                                                        <a data-id="{{$category->id}}" id="{{$category->id}}" data-token="{{csrf_token()}}" class="delete_category on-default remove-row">
                                                            <i class="fa fa-trash-o"></i>
                                                        </a>
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

    @include('admin.categories.java.category')

@endsection