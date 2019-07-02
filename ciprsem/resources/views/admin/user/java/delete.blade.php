<script>

    $('.delete_user').on('click',function(e){
        e.preventDefault();
        var idd = $(this).attr("id");
        var id =  $(this).data("id");
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
                            url: 'users/delete/' + id,
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token
                            },
                            success: function (data) {
                                // bootbox.alert(data.success);

                                $(".user" + idd).fadeOut('slow');
                            }

                        });

                    }
                }
            }
        });
    });
</script>

<script>

    $('.unlock_account').on('click',function(e){
        e.preventDefault();
        var id =  $(this).data("id");
        var token = $(this).data("token");

        $.ajax( {
            url: 'users/active/' + id,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": id,
                "_token": token
            },
            success: function (data) {
                if(data.success.disable)
                {
                    $(".status" + id).find('#status_account').find('i').removeClass('fa fa-unlock');
                    $(".status" + id).find('#status_account').find('i').addClass('fa fa-lock');
                    // console.log(data.success.disable);
                }
                if(data.success.active)
                {
                    $(".status" + id).find('#status_account').find('i').removeClass('fa fa-lock');
                    $(".status" + id).find('#status_account').find('i').addClass('fa fa-unlock');
                    // console.log(data.success.active);
                }


                // console.log(data.success);
            }

        });

    });
</script>