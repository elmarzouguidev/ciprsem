@extends('layouts.admin')

@section('content')
    <div class="container">



        <!-- Start Widget -->
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-info"><i class="ion-edit"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{$Articles}}</span>
                        Total Article
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Les articles <span class="pull-right">60%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-purple"><i class="ion-images"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{$photos}}</span>
                        Total Images
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Les images <span class="pull-right">90%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                    <span class="sr-only">90% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-success"><i class="ion-videocamera"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{$videos}}</span>
                        Total videos
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Les videos <span class="pull-right">60%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                    <div class="mini-stat-info text-right text-muted">
                        <span class="counter">{{Auth::user()->count()}}</span>
                        Total Admins
                    </div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">Users <span class="pull-right">57%</span></h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                    <span class="sr-only">57% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row-->


        <div class="row">

            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Todo</h3>
                    </div>
                    <div class="panel-body todoapp">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 id="todo-message"><span id="todo-remaining"></span> of <span id="todo-total"></span> remaining</h4>
                            </div>
                            <div class="col-sm-6">
                                <a href="" class="pull-right btn btn-primary btn-sm waves-effect waves-light" id="btn-archive">Archive</a>
                            </div>
                        </div>

                        <ul class="list-group no-margn nicescroll todo-list" style="max-height: 288px;" id="todo-list"></ul>

                        <form name="todo-form" id="todo-form" role="form" class="m-t-20">
                            <div class="row">
                                <div class="col-sm-9 todo-inputbar">
                                    <input type="text" id="todo-input-text" name="todo-input-text" class="form-control" placeholder="Add new todo">
                                </div>
                                <div class="col-sm-3 todo-send">
                                    <button class="btn-primary btn-block btn waves-effect waves-light" type="button" id="todo-btn-submit">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container -->
@endsection
