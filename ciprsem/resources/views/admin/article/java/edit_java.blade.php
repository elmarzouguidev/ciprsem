<script>

    $('#form-article-edit').on('submit',function(e){

        e.preventDefault();
        tinyMCE.triggerSave();

        var form = new FormData(this);
        var title = $('#title').val();
        var body = $('#body').val();
        var thefile = $('#thumb')[0].files[0];
        var thefile_n = $('#thumb').val();
        form.append('title', title);
        form.append('body', body);
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
            url: '{{URL::route('admin.article.edit.save',$articles_edit->id)}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {
                    // console.log(data.errors);
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
                    $('#edit_ok').find('a').text(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/

                    var delay = 2000;
                    setTimeout(function()
                        {
                            $('#edit_ok').find('a').remove();
                            window.location = '{{URL::route('admin.article.all')}}'
                        },
                        delay);
                }

            }
        });
    });
</script>