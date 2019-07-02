<script>

    $('#on_off').on('submit',function(e){

        e.preventDefault();
        var form = new FormData(this);

       // form.append('thefile', thefile);
        /* Abdelghafour ***/
        $.ajax({
            url: '{{URL::route('admin.system.control.boot')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {
                    console.log(data.errors);

                    if (data.errors) {
                        $('#if-errors').removeClass('hidden');
                        $('#if-errors').text(data.errors);
                    }
                }
                else
                {
                    console.log(data.success);
                    $('#if-errors').removeClass('hidden');

                    $('#if-errors').text(data.success.system_down);

                    /*$("#list_art").load(location.href + " #list_art");*/

                }
            }
        });
    });

</script>