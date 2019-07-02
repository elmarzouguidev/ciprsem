<script>

    $('.delete_videos').on('click',function(e){
        e.preventDefault();
        var idd = $(this).attr("id");
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
                            url: 'videos/delete/' + id,
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token
                            },
                            success: function (data) {
                               // bootbox.alert(data.success);
                                //console.log(data.errors);
                                //console.log(data.success);
                                $(".videos" + idd).fadeOut('slow');
                            }

                        });

                    }
                }
            }
        });
    });
</script>