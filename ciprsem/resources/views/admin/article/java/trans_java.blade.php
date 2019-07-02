<script>
    $(document).ready(function(){
        var myLanguage = {
            errorTitle: '{{trans('admin.errors.errors_articles')}}'
        };

        $.validate({
            form : '#form-article-trans',
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

    $('#form-article-trans').on('submit',function(e){
        tinyMCE.triggerSave();
        e.preventDefault();
        var form = new FormData(this);

        var trans_lng = $('#trans_lng').val();
        var title = $('#title').val();
        var body = $('#body').val();

        form.append('trans_lng', trans_lng);
        form.append('title', title);
        form.append('body', body);

        $.ajax({
            url: '{{URL::route('admin.article.trans.save',$articles_edit->id)}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,

            success:function(data) {


                if (data.errors) {
                    $('.need_tr').addClass('hidden');
                    if (data.errors.trans_lng) {
                        $('#trans_ok').removeClass('hidden');
                        $('#trans_ok').find('a').text(data.errors.trans_lng);
                    }
                    if (data.errors.title) {
                        $('#trans_ok').removeClass('hidden');
                        $('#trans_ok').find('a').text(data.errors.title);
                    }
                    if (data.errors.body) {
                        $('#trans_ok').removeClass('hidden');
                        $('#trans_ok').find('a').text(data.errors.body);
                    }

                   /* $('#trans_ok').removeClass('hidden');
                    $('#trans_ok').find('a').text(data.errors);*/
                }
                else
                {

                    //$('#form-article-add')[0].reset();
                    $('.need_tr').addClass('hidden');

                    $('#trans_ok').removeClass('hidden');
                    $('#trans_ok').find('a').text(data.success);
                    // $('.trans_ok').text(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                    var delay = 2000;
                    setTimeout(function()
                            {
                                window.location = '{{URL::route('admin.article.trans')}}'
                            },
                            delay);
                }

            }
        });
    });

</script>