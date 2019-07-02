<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea',
        plugins :'link code',
        directionality :'{{LaravelLocalization::getCurrentLocaleDirection()}}'
    });
</script>
<script>
    function Rtl() {

        tinymce.remove();
        tinymce.init({
            selector:'textarea',
            plugins :'link code',
            directionality :"rtl"
            /* menubar :false,*/
            /* toolbar: 'undo redo | cut copy paste'*/
        });
    }
    function Ltr() {
        tinymce.remove();
        tinymce.init({
            selector:'textarea',
            plugins :'link code',
            directionality :"ltr"
            /* menubar :false,*/
            /* toolbar: 'undo redo | cut copy paste'*/
        });
    }

</script>