<script>


    $('#form-edit-profile').on('submit',function(e){

        e.preventDefault();

        $('#form-edit-profile').on('click',function () {

            $('#err_fullname').addClass('hidden');
            $('#err_email').addClass('hidden');
            $('#err_facebook').addClass('hidden');
            $('#err_address').addClass('hidden');
            $('#err_phone').addClass('hidden');
            $('#err_about').addClass('hidden');

        });
        var form     = new FormData(this);
        var fullname     = $('#fullname').val();
        var email    = $('#email').val();
        var facebook = $('#facebook').val();
        var address  = $('#address').val();
        var phone    = $('#phone').val();
        var about    = $('#about').val();

        form.append('fullname', fullname);
        form.append('email', email);
        form.append('facebook', facebook);
        form.append('phone', phone);
        form.append('address', address);
        form.append('about', about);

        $.ajax({
            url: '{{URL::route('admin.users.profile.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {

                    if (data.errors.fullname) {
                        //  console.log(data.errors);
                        $('#err_fullname').removeClass('hidden');
                        $('#err_fullname').text(data.errors.fullname);
                    }
                    if (data.errors.email) {
                        $('#err_email').removeClass('hidden');
                        $('#err_email').text(data.errors.email);
                    }
                    if (data.errors.facebook) {
                        $('#err_facebook').removeClass('hidden');
                        $('#err_facebook').text(data.errors.facebook);
                    }
                    if (data.errors.phone) {
                        $('#err_phone').removeClass('hidden');
                        $('#err_phone').text(data.errors.phone);
                    }
                    if (data.errors.address) {
                        $('#err_address').removeClass('hidden');
                        $('#err_address').text(data.errors.address);
                    }
                    if (data.errors.about) {

                        $('#err_about').removeClass('hidden');
                        $('#err_about').text(data.errors.about);
                    }




                    if (data.errors.failed) {

                        $('#is_created').removeClass('hidden');
                        $('#is_created').text(data.errors.failed);
                    }
                }
                else
                {

                    $('#is_created').removeClass('hidden');

                    $('#is_created').text(data.success);
                    var delay = 300;
                    setTimeout(function()
                        {
                            window.location = '{{URL::route('admin.users.profile')}}'

                        },
                        delay);


                }
            }
        });
    });


</script>