@extends('layouts.admin')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title">{{trans('admin.articles.add_articles')}}</h3></div>
                    <div class="panel-body">
                        <section class="content-header box-infos-header" id="edit_ok">
                            <a href="#" class="show_ok" style="color: #000">

                            </a>
                        </section>

                        @if($loc=="ar")
                            @include('admin.article.edit.ar')
                        @endif

                        @if($loc=="fr")
                            @include('admin.article.edit.fr')
                        @endif

                        @if($loc=="en")
                            @include('admin.article.edit.en')
                        @endif

                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->

    </div> <!-- container -->

@endsection

@section('script_master')

    @include('admin.article.java.edit_java')

@endsection



