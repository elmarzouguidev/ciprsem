<script>

    $('#add_permission_to_user').on('submit',function(e){
        $('#add_permission_to_user').on('click',function () {
            $('#is_err').addClass('hidden');

        });
        e.preventDefault();
        var form = new FormData(this);
        var email = $('#email').val();
        var name  = $('#permission').data("nameof");

        console.log(name);
        form.append('email', email);
        form.append('name', name);

        $.ajax({
            url: '{{URL::route('admin.add_roles')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors)
                {
                    if (data.errors.email)
                    {

                        $('#is_err').removeClass('hidden');
                        $('#is_err').text(data.errors.email);
                    }
                    if (data.errors.permission)
                    {
                        $('#is_err').removeClass('hidden');
                        $('#is_err').text(data.errors.permission);
                    }
                    console.log(data.errors);
                }
                else
                {

                    $('#is_created').removeClass('hidden');

                    $('#is_created').text(data.success);
                    console.log(data.success);
                }
            }
        });
    });

</script>