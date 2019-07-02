@extends('layouts.app_profile')

@section('content')

    <!-- ******HEADER****** -->



    @include('profile.header.header')

    <div class="container" style="margin-top: 80px" id="list_art">

        <div class="row">

            <div class="list_of_ar col-md-10 col-lg-10 col-lg-offset-1" >

                @if($loc=='ar')
                    @include('profile.article.arabic')

                @endif

                @if($loc=='fr')
                    @include('profile.article.french')
                @endif

                @if($loc=='en')
                    @include('profile.article.english')
                @endif
            </div>

        </div>
    </div>
    <div class="container">
        @include('profile.article.form')

    </div>

    <script>
        $('#add_ar').on('submit',function(e){
            tinyMCE.triggerSave();
            e.preventDefault();
            var form = new FormData(this);
            var title = $('#title').val();
            var body = $('#body').val();
            var thefile = $('#thefile')[0].files[0];

            form.append('title', title);
            form.append('body', body);
            form.append('thefile', thefile);


            $.ajax({
                url: '{{URL::route('article.store')}}',
                type: 'POST',
                data: form,
                processData: false,
                contentType: false,

                success:function(data) {


                    if (data.errors) {

                        if (data.errors.title) {
                            $('.errortitle').removeClass('hidden');
                            $('.errortitle').text(data.errors.title);
                        }
                        if (data.errors.body) {
                            $('.errorbody').removeClass('hidden');
                            $('.errorbody').text(data.errors.body);
                        }
                        if (data.errors.thefile) {
                            $('.errorthefile').removeClass('hidden');
                            $('.errorthefile').text(data.errors.thefile);
                        }

                    }
                    else
                    {
                        $('#add_ar')[0].reset();
                        $('.save').text(data.success);
                        $("#list_art").load(location.href + " #list_art");
                    }

                }
            });


        });


    </script>





@endsection