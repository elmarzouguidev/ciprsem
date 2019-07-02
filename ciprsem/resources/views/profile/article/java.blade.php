<script>
    // Delete article * * * * * */
    $('.delete_article').on('click',function(e){
        e.preventDefault();
        var idd = $(this).attr("id");
        var token = $(this).data("token");
        // console.log($('.delete_comment').data('id'));
        $.ajax({
            type:'DELETE',
            url:'{{URL::to('profile/articles/all/delete/')}}' + idd,
            data:{
                '_token':$('input[name=_token]').val(),
                'id':idd
            },
            success:function (data) {
                // console.log(data.errors);
                if (data.errors) {
                    console.log(data.errors);
                }
                else{
                    console.log(data.success);
                    $("#list_art").load(location.href + " #list_art");
                }
            }
        });

    });
</script>