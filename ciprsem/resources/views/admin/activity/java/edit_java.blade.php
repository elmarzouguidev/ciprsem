<script>
    $(document).ready(function(){
        var myLanguage = {
            errorTitle: '{{trans('admin.errors.errors_articles')}}'
        };
        $('#form-activities-edit').submit(function(){
            tinyMCE.triggerSave();
        });
        $.validate({
            form : '#form-activities-edit',
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

    $('#form-activities-edit').on('submit',function(e){
        tinyMCE.triggerSave();
        e.preventDefault();
        var form = new FormData(this);
        var title = $('#title').val();
        var body = $('#body').val();
        var linke = $('#linke').val();
        var date = $('#date').val();
        var thefile = $('#thumb')[0].files[0];
        var thefile_n = $('#thumb').val();
        form.append('title', title);
        form.append('body', body);
        form.append('linke', linke);
        form.append('date', date);
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
            url: '{{URL::route('admin.activities.edit.save',$articles_edit->id)}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors)
                {
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

                    //console.log(data.success);

                    $('#edit_ok').find('a').text(data.success);
                    var delay = 2000;
                    setTimeout(function()
                            {
                                window.location = '{{URL::route('admin.activities.all')}}'
                            },
                            delay);
                    /*$("#list_art").load(location.href + " #list_art");*/
                }

            }
        });
    });
</script>