<script>
    $(document).ready(function(){
        var myLanguage = {
            errorTitle: '{{trans('admin.errors.errors_articles')}}'
        };
        $('#form-videos-edit').submit(function(){
            tinyMCE.triggerSave();
        });
        $.validate({
            form : '#form-videos-edit',
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

    });

    $('#form-videos-edit').on('submit',function(e){
        tinyMCE.triggerSave();
        e.preventDefault();
        var form = new FormData(this);
        var title = $('#title').val();
        var linke = $('#linke').val();
       // var body = $('#body').val();
        var thefile = $('#thumb')[0].files[0];
        var thefile_n = $('#thumb').val();
        form.append('title', title);
        form.append('linke', linke);
        //form.append('body', body);
        if(thefile)
        {
            form.append('thefile', thefile);
        }
        else
        {
            form.append('thefile', thefile_n);
        }
       // console.log(thefile_n);
        $.ajax({
            url: '{{URL::route('admin.videos.edit.save',$articles_edit->id)}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {
                    // console.log(data.errors);
                    if (data.errors.title) {

                        $('#edit_ok').find('a').text(data.errors.title);
                    }
                    if (data.errors.linke) {

                        $('#edit_ok').find('a').text(data.errors.linke);
                    }
                   /* if (data.errors.body) {
                        $('.errorbody').removeClass('hidden');
                        $('.errorbody').text(data.errors.body);
                    }*/
                    if (data.errors.thefile) {

                        $('#edit_ok').find('a').text(data.errors.thefile);
                    }

                }
                else
                {
                    $('#edit_ok').find('a').text(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                }

            }
        });
    });
</script>