<script>

    $(document).ready(function(){
        var myLanguage = {
            errorTitle: '{{trans('admin.errors.errors_articles')}}'
        };
        $('#form-videos-add').submit(function(){
            tinyMCE.triggerSave();
        });
        $.validate({
            form : '#form-videos-add',
            language : myLanguage,
            modules : 'file',
            validateOnBlur : false,
            errorMessagePosition : 'top',
            onError : function() {
                //alert('alert !');
            },
            onSuccess : function() {
                //alert('success!');
            }
        });
        $('#trans_lng').on('change',function () {
            $('.lng_prb').addClass('hidden');
        });
    });
    $('#form-videos-add').on('submit',function(e){
        tinyMCE.triggerSave();
        e.preventDefault();
        var form = new FormData(this);
       // var trans_lng = $('#trans_lng').val();
        var title = $('#title').val();
        var linke = $('#linke').val();
       // var body = $('#body').val();
        var thefile = $('#thefile')[0].files[0];
        var thefile_n = $('#thefile').val();
        if(thefile)
        {
            form.append('thefile', thefile);
        }
        else
        {
            form.append('thefile', thefile_n);
        }
       // form.append('trans_lng', trans_lng);
        form.append('title', title);
        form.append('linke', linke);
        //form.append('body', body);
        $.ajax({
            url: '{{URL::route('admin.videos.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {
               // console.log(data.errors);
                if (data.errors) {
                    if (data.errors.title) {
                        $('.show_ok').text(data.errors.title);
                    }
                    if (data.errors.linke) {
                        $('.show_ok').text(data.errors.linke);
                    }

                 //   console.log(data.errors);

                    if (data.errors.thefile) {
                        $('.show_ok').text(data.errors.thefile);
                    }
                }
                else
                {
                    //console.log(data.success);
                    $('#form-videos-add')[0].reset();
                    $('.show_ok').text(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                    var delay = 2000;
                    setTimeout(function()
                            {
                                window.location = '{{URL::route('admin.videos.all')}}'
                            },
                            delay);
                }
            }
        });
    });

</script>