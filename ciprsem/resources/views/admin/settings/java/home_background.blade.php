<script>

    $('#add-background').on('submit',function(e){

        e.preventDefault();
        var form = new FormData(this);
        var thefile = $('#thefile')[0].files[0];
        form.append('thefile', thefile);
        /* Abdelghafour ***/
        $.ajax({
            url: '{{URL::route('admin.ciprsem.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {
                    console.log(data.errors);

                    if (data.errors.thefile) {
                        $('#if-errors').removeClass('hidden');
                        $('#if-errors').text(data.errors.thefile);
                    }
                }
                else
                {
                    $('#if-ok').removeClass('hidden');

                    $('#if-ok').text(data.success);
                    var delay = 300;
                    setTimeout(function()
                        {
                            window.location = '{{URL::route('admin.ciprsem.settings')}}'
                        },
                        delay);
                    /*$("#list_art").load(location.href + " #list_art");*/

                }
            }
        });
    });

</script>

<script>

    $('.delete_background').on('click',function(e){
        e.preventDefault();
        var id = $(this).data("id");
        var token = $(this).data("token");
        bootbox.dialog({
            message: "{{trans('admin.articles.delete_it')}}",
            title: "<i class='glyphicon glyphicon-trash'></i>",
            buttons: {
                success: {
                    label: "{{trans('admin.articles.delete_it_no')}}",
                    className: "btn-success",
                    callback: function() {
                        $('.bootbox').modal('hide');
                    }
                },
                danger: {
                    label: "{{trans('admin.articles.delete_it_yes')}}",
                    className: "btn-danger",
                    callback: function() {
                        $.ajax( {
                            url: 'settings/delete/' + id,
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token
                            },
                            success: function (data) {

                                if(data.success)
                                {

                                    $("#background_home").load(location.href + " #background_home");
                                }
                                else
                                {
                                    bootbox.alert(data.errors);

                                }

                            }
                        });
                    }
                }
            }
        });
    });
</script>