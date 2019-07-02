<script>

    $(document).ready(function(){
        var myLanguage = {
            errorTitle: '{{trans('admin.errors.errors_articles')}}'
        };
        $('#form-activities-add').submit(function(){
            tinyMCE.triggerSave();
        });
        $.validate({
            form : '#form-activities-add',
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
    $('#form-activities-add').on('submit',function(e){
        tinyMCE.triggerSave();
        e.preventDefault();
        var form = new FormData(this);
        var trans_lng = $('#trans_lng').val();
        var title = $('#title').val();
        var linke = $('#linke').val();
        var date  = $('#date').val();
        var body  = $('#body').val();
        var thefile = $('#thefile')[0].files[0];
        form.append('trans_lng', trans_lng);
        form.append('title', title);
        form.append('linke', linke);
        form.append('date', date);
        form.append('body', body);
        form.append('thefile', thefile);

        $.ajax({
            url: '{{URL::route('admin.activities.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,

            success:function(data) {


                if (data.errors) {

                    if (data.errors.arabic_str) {
                        $('.lng_prb').removeClass('hidden');
                        $('.lng_prb').find('a').text(data.errors.arabic_str);
                    }
                    if (data.errors.trans_lng) {
                        $('.show_ok').text(data.errors.trans_lng);
                    }
                    if (data.errors.title) {
                        $('.show_ok').text(data.errors.title);
                    }
                    if (data.errors.date) {
                        $('.show_ok').text(data.errors.date);
                    }
                    if (data.errors.body) {
                        $('.show_ok').text(data.errors.body);
                    }
                    if (data.errors.thefile) {
                        $('.show_ok').text(data.errors.thefile);
                    }

                }
                else
                {

                    $('#form-activities-add')[0].reset();
                    $('.show_ok').text(data.success);
                    //console.log(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                    var delay = 2000;
                    setTimeout(function()
                            {
                                window.location = '{{URL::route('admin.activities.trans')}}'
                            },
                            delay);
                }

            }
        });
    });


</script>