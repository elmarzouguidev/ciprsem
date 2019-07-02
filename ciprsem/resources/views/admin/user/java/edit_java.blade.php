<script>

    $('#form-user-edit').on('submit',function(e){
        e.preventDefault();

        $('#form-user-edit').on('click',function () {
            $('#err_name').addClass('hidden');
            $('#err_email').addClass('hidden');
            $('#err_pass').addClass('hidden');
            $('#err_pass_old').addClass('hidden');
            $('#err_pass_conf').addClass('hidden');
            $('#err_').addClass('hidden');
            $('#err_nothing').addClass('hidden');
        });

        var form = new FormData(this);

        var email    = $('#email').val();
        var theold   = $('#theold').val();
        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();

        form.append('email', email);
        form.append('theold', theold);
        form.append('password', password);
        form.append('password_confirmation', password_confirmation);
        //  form.append('phone', phone);

        $.ajax({
            url: '{{URL::route('admin.settings.save')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {

                     if (data.errors.email) {
                     $('#err_email').removeClass('hidden');
                     $('#err_email').text(data.errors.email);
                     }
                    if (data.errors.theold) {
                        $('#err_pass_old').removeClass('hidden');
                        $('#err_pass_old').text(data.errors.theold);
                    }

                    console.log(data.errors.password);
                    if (data.errors.password) {
                        $('#err_pass').removeClass('hidden');
                        $('#err_pass').text(data.errors.password);
                    }

                   /* if (data.errors.password_confirmation.confirmed) {
                        $('#err_pass_conf').removeClass('hidden');
                        $('#err_pass_conf').text(data.errors.password_confirmation.confirmed);
                    }*/


                    if (data.errors.old) {
                        $('#err_').removeClass('hidden');
                        $('#err_').text(data.errors.old);
                    }

                    if (data.errors.thefile) {
                        $('#err_file').removeClass('hidden');
                        $('#err_file').text(data.errors.thefile);
                    }

                    if (data.errors.nothing) {
                        $('#err_nothing').removeClass('hidden');
                        $('#err_nothing').text(data.errors.nothing);
                    }

                }

                else
                {
                    $('#form-user-edit')[0].reset();
                    $('#is_created').removeClass('hidden');
                    $('#is_created').text(data.success);

                    var delay = 700;
                    setTimeout(function()
                        {
                            window.location = '{{URL::route('admin.user.relogin')}}'
                        },
                        delay);
                    /*$("#list_art").load(location.href + " #list_art");*/

                }
            }
        });
    });

</script>

<script>

    $('#form-user-edit-avatar').on('submit',function(e){
        e.preventDefault();

        $('#form-user-edit-avatar').on('click',function () {
            $('#err_file').addClass('hidden');
        });

        var form = new FormData(this);

        var thefile = $('#thumb')[0].files[0];

        if(thefile)
        {
            form.append('thefile', thefile);
        }

        // console.log(theold);
        $.ajax({
            url: '{{URL::route('admin.settings.avatar')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {

                    if (data.errors.thefile) {
                        $('#err_file').removeClass('hidden');
                        $('#err_file').text(data.errors.thefile);
                    }
                }

                else
                {
                    $('#is_file').removeClass('hidden');
                    $('#is_file').text(data.success);

                    $("#avatar").load(location.href + " #avatar");

                }
            }
        });
    });

</script>