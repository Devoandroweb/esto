<script>
    $(document).ready(function() {

        $('.btn-upload-img').click(function(e) {
            $(".upload_foto").click();
        });
        //priview gambar

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.view_image').attr('src', e.target.result);
                    $('.btn-upload-img').text(input.files[0]['name']);

                }
                reader.readAsDataURL(input.files[0]);
            }

        }
        $('.upload_foto').change(function() {
            var file = $(this);
            var files_obj = file[0].files;
            var ukuran_file = files_obj[0].size;

            if (ukuran_file > 1024000) {
                $('.alert-foto').removeClass('d-none');
                $('.alert-foto').addClass('d-block');
            } else {
                $('.alert-foto').addClass('d-none');
                $('.alert-foto').removeClass('d-block');

            }

            readURL(this);
        });
    });
</script>