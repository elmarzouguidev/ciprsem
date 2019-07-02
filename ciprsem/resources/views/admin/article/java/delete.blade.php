<script>

    $('.delete_article').on('click',function(e){
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
                            url: 'article/delete/' + id,
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token
                            },
                            success: function (data) {
                                // bootbox.alert(data.success);
                                //console.log(data);
                                $(".article" + idd).fadeOut('slow');
                            }

                        });

                    }
                }
            }
        });
    });
</script>

<script>

    $('.active_article').on('click',function(e){
        e.preventDefault();
        var id =  $(this).data("id");
        var token = $(this).data("token");

        $.ajax( {
            url: 'article/enable/' + id,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": id,
                "_token": token
            },
            success: function (data) {
                if(data.success.disable)
                {
                    $(".article_status" + id).find('#status_article').find('i').removeClass('fa fa-unlock');
                    $(".article_status" + id).find('#status_article').find('i').addClass('fa fa-lock');

                    $(".article_status" + id).find('#status_article').removeClass('btn-success');
                    $(".article_status" + id).find('#status_article').addClass('btn-danger');
                    // console.log(data.success.disable);
                }
                if(data.success.active)
                {
                    $(".article_status" + id).find('#status_article').find('i').removeClass('fa fa-lock');
                    $(".article_status" + id).find('#status_article').find('i').addClass('fa fa-unlock');

                    $(".article_status" + id).find('#status_article').removeClass('btn-danger');
                    $(".article_status" + id).find('#status_article').addClass('btn-success');
                    // console.log(data.success.active);
                }


               // console.log(data.success);
            }

        });

    });
</script>

<script>

    $('.delete_comment').on('click',function(e){
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
                            url: 'delete/' + id,
                            type: 'DELETE',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'DELETE',
                                "_token": token
                            },
                            success: function (data) {
                                // bootbox.alert(data.success);
                                //   console.log(data.success);
                                $(".comment" + idd).fadeOut('slow');
                            }

                        });

                    }
                }
            }
        });
    });
</script>

<script>

    $('.active_comment').on('click',function(e){
        e.preventDefault();
        var id =  $(this).data("id");
        var token = $(this).data("token");

        $.ajax( {
            url: 'enable/' + id,
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": id,
                "_token": token
            },
            success: function (data) {
                if(data.success.disable)
                {
                    $(".comment" + id).find('#status_comment').find('i').removeClass('fa fa-unlock');
                    $(".comment" + id).find('#status_comment').find('i').addClass('fa fa-lock');

                    $(".comment" + id).find('#status_comment').removeClass('btn-success');
                    $(".comment" + id).find('#status_comment').addClass('btn-danger');
                    // console.log(data.success.disable);
                }
                if(data.success.active)
                {
                    $(".comment" + id).find('#status_comment').find('i').removeClass('fa fa-lock');
                    $(".comment" + id).find('#status_comment').find('i').addClass('fa fa-unlock');

                    $(".comment" + id).find('#status_comment').removeClass('btn-danger');
                    $(".comment" + id).find('#status_comment').addClass('btn-success');
                    // console.log(data.success.active);
                }


               // console.log(data.success);
            }

        });

    });
</script>