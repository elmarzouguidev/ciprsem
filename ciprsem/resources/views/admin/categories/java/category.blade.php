<script>


    $('#form-category-add').on('submit',function(e){

        e.preventDefault();

        var form = new FormData(this);
        var name = $('#name').val();
        var category_type = $('#category_type').val();

        form.append('name', name);
        form.append('category_type', category_type);
        /* Abdelghafour ***/
        $.ajax({
            url: '{{URL::route('admin.categories.store')}}',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            success:function(data) {

                if (data.errors) {
                    if (data.errors.name) {
                        $('.show_ok').removeClass('hidden');
                        $('.show_ok').text(data.errors.name);
                    }
                    if (data.errors.category_type) {

                        $('.show_ok').removeClass('hidden');
                        $('.show_ok').text(data.errors.category_type);
                    }
                    console.log(data.errors);

                }
                else
                {
                    $('#form-category-add')[0].reset();
                    $('.show_ok').text(data.success);
                    $("#list_categories").load(location.href + " #list_categories");

                    var delay = 300;
                    setTimeout(function()
                        {
                            window.location = '{{URL::route('admin.categories.create')}}'
                        },
                        delay);

                }
            }
        });
    });

</script>

<script>

    $('.delete_category').on('click',function(e){
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
                            url: 'categories/delete/' + id,
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

                                    $(".categories" + idd).fadeOut('slow');
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