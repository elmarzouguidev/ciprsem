<script>


    $('#form-user-add').on('submit',function(e){
        $('#form-user-add').on('click',function () {
            $('#err_name').addClass('hidden');
            $('#err_email').addClass('hidden');
            $('#err_pass').addClass('hidden');
            $('#err_phone').addClass('hidden');
        });
        e.preventDefault();
        var form = new FormData(this);
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var phone = $('#phone').val();

        var thefile = $('#thumb')[0].files[0];
        form.append('name', name);
        form.append('email', email);
        form.append('password', password);

        form.append('phone', phone);

        if(thefile)
        {
            form.append('thefile', thefile);
        }
        //console.log(thefile);
        $.ajax({
            url: '{{URL::route('admin.users.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {
                    console.log(data.errors);
                    if (data.errors.name) {
                        //  console.log(data.errors);
                        $('#err_name').removeClass('hidden');
                        $('#err_name').text(data.errors.name);
                    }
                    if (data.errors.email) {
                        $('#err_email').removeClass('hidden');
                        $('#err_email').text(data.errors.email);
                    }
                    if (data.errors.password) {
                        $('#err_pass').removeClass('hidden');
                        $('#err_pass').text(data.errors.password);
                    }
                    if (data.errors.phone) {
                        $('#err_phone').removeClass('hidden');
                        $('#err_phone').text(data.errors.phone);
                    }


                    if (data.errors.thefile) {
                        $('#err_file').removeClass('hidden');
                        $('#err_file').text(data.errors.thefile);
                    }
                }
                else
                {
                    $('#form-user-add')[0].reset();

                    $('#is_created').removeClass('hidden');
                    $('#is_created').text(data.success);
                    /*$("#list_art").load(location.href + " #list_art");*/
                    var delay = 500;
                    setTimeout(function()
                        {
                            window.location = '{{URL::route('admin.users.all')}}'

                        },
                        delay);
                }
            }
        });
    });


</script>