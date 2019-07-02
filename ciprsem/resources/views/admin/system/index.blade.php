@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Switch</h3></div>
                        <div class="panel-body">
                            <a  id="if-errors" class="btn btn-danger waves-effect waves-light btn-block hidden">

                            </a>
                            <form class="form-horizontal" id="on_off" action="{{URL::route('admin.system.control.boot')}}">
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light m-r-5" >
                                                <i class="fa fa-power-off"></i>
                                                ON/OFF
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->

            </div> <!-- End row -->
        </div>
    </div>

@endsection

@section('script_master')

    @include('admin.system.java.On_OFF')

@endsection