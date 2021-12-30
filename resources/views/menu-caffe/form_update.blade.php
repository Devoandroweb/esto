<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin-menu-caffe-tambah-simpan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Menu</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Menu ..." value="{{$menu->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Harga ..." value="{{$menu->harga}}">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <div class="gruop">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input " id="minuman" type="radio" name="jenis" {{($menu->jenis == 1)'checked'?''}}>
                                        <label class="form-check-label " for="minuman">Minuman</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="makanan" type="radio" name="jenis" {{($menu->jenis == 2)'checked'?''}}>
                                        <label class="form-check-label" for="makanan">Makanan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{($menu->jenis == 1)''?'d-none'}}" id="tipe">
                                <label>Tipe</label>
                                <div class="gruop">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio3" type="radio" name="tipe" {{($menu->tipe == 1)'checked'?''}}>
                                        <label class="form-check-label" for="radio3">Panas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio4" type="radio" name="tipe" {{($menu->tipe == 2)'checked'?''}}>
                                        <label class="form-check-label" for="radio4">Dingin</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-danger alert-foto d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
                            <div class="img-show d-block p-1 rounded bg-dark">
                                @if($menu->image == null || $menu->image == "")
                                <img src="{{asset('public/img/img-default.png')}}" class="w-100 view_image" height="100%">
                                @else
                                <img src="{{asset('public/img')}}/{{$menu->image}}" class="w-100 view_image" height="100%">
                                @endif
                                <input type="file" name="foto" class="d-none upload_foto" value="">
                                <button type="button" class="btn btn-danger w-100 btn-upload-img">Upload Foto</button>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->



                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function() {



        checkJenis($("#minuman"));
        $("#minuman").on('change', function() {
            checkJenis($(this));
        });
        $("#makanan").on('change', function() {
            checkJenis($(this));
        });

        function checkJenis(input) {
            if (input.attr('id') == "minuman") {
                if (input.is(':checked')) {
                    $('#tipe').removeClass("d-none");
                } else {
                    $('#tipe').addClass("d-none");
                }
            } else {
                $('#tipe').addClass("d-none");
            }

        }
    });
</script>
<script>
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
</script>
@endpush