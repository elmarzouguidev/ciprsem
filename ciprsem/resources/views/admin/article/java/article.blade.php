<script>

    $(document).ready(function(){

        $('#trans_lng').on('change',function () {
            $('.lng_prb').addClass('hidden');
        });
    });
    $('#form-article-add').on('submit',function(e){

        e.preventDefault();
        tinyMCE.triggerSave();
        var form = new FormData(this);
        var trans_lng = $('#trans_lng').val();
        var title = $('#title').val();
        var body = $('#body').val();
        var thefile = $('#thefile')[0].files[0];
        form.append('trans_lng', trans_lng);
        form.append('title', title);
        form.append('body', body);
        form.append('thefile', thefile);
        /* Abdelghafour ***/
        $.ajax({
            url: '{{URL::route('admin.article.store')}}',
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
                    if (data.errors.arabic_str) {
                        $('.lng_prb').removeClass('hidden');
                        $('.lng_prb').text(data.errors.arabic_str);
                    }
                    if (data.errors.trans_lng) {
                        $('.errorlng').removeClass('hidden');
                        $('.errorlng').text(data.errors.trans_lng);
                    }
                    console.log(data.errors);

                    if (data.errors.thefile) {
                        $('.show_ok').text(data.errors.thefile);
                    }
                }
                else
                {
                    $('.load').removeClass('hidden');
                    $('#form-article-add')[0].reset();
                    $('.show_ok').text(data.success);
                    //console.log(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                    var delay = 3000;
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