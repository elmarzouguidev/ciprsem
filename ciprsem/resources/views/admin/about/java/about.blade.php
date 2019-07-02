<script>

    $(document).ready(function(){
        var myLanguage = {
            errorTitle: '{{trans('admin.errors.errors_articles')}}'
        };
        $('#form-about-add').submit(function(){
            tinyMCE.triggerSave();
        });
        $.validate({
            form : '#form-about-add',
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
    $('#form-about-add').on('submit',function(e){
        tinyMCE.triggerSave();
        e.preventDefault();
        var form = new FormData(this);
        var trans_lng = $('#trans_lng').val();
        var body = $('#body').val();
        var thefile = $('#thumb')[0].files[0];
        form.append('trans_lng', trans_lng);

        form.append('body', body);
        if(thefile)
        {
            form.append('thefile', thefile);
        }

        $.ajax({
            url: '{{URL::route('admin.about.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {
                console.log(data);
                if (data.errors) {
                    if (data.errors.arabic_str) {
                        $('.lng_prb').removeClass('hidden');
                        $('.lng_prb').find('a').text(data.errors.arabic_str);
                    }
                    if (data.errors.trans_lng) {
                        $('.show_ok').text(data.errors.trans_lng);
                    }
                    console.log(data.errors);

                    if (data.errors.thefile) {
                        $('.show_ok').text(data.errors.thefile);
                    }
                }
                else
                {
                    $('#form-about-add')[0].reset();
                    $('.show_ok').text(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                    var delay = 2000;
                    setTimeout(function()
                            {

                                window.location.assign("{{URL::route('about.us')}}")
                            },
                            delay);
                }
            }
        });
    });

</script>