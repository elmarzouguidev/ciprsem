<script>

    $('#add-permission').on('submit',function(e){
        $('#add-permission').on('click',function () {
            $('#is_err').addClass('hidden');

        });
        e.preventDefault();
        var form = new FormData(this);
        var name = $('#name').val();
        var description = $('#description').val();
        form.append('name', name);
        form.append('description', description);

        $.ajax({
            url: '{{URL::route('admin.roles.save')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors)
                {
                    if (data.errors.name)
                    {

                        $('#is_err').removeClass('hidden');
                        $('#is_err').text(data.errors.name);
                    }
                    if (data.errors.description)
                    {
                        $('#is_err').removeClass('hidden');
                        $('#is_err').text(data.errors.description);
                    }
                }
                else
                {

                    $('#is_created').removeClass('hidden');

                    $('#is_created').text(data.success);

                }
            }
        });
    });

</script>