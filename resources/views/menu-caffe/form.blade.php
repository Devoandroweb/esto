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
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Menu ...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Harga</label>
                                <input type="text" name="harga" class="form-control" id="exampleInputPassword1" placeholder="Harga ...">
                            </div>
                            <div class="form-group">
                                <label>Jenis</label>
                                <div class="gruop">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input " id="minuman" type="radio" name="jenis" value="1">
                                        <label class="form-check-label " for="minuman">Minuman</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="makanan" type="radio" name="jenis" value="2">
                                        <label class="form-check-label" for="makanan">Makanan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-none" id="tipe">
                                <label>Tipe</label>
                                <div class="gruop">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio3" type="radio" name="tipe" value="1">
                                        <label class="form-check-label" for="radio3">Panas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio4" type="radio" name="tipe" value="2">
                                        <label class="form-check-label" for="radio4">Dingin</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-danger alert-foto d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
                            <div class="img-show d-block p-1 rounded bg-dark">
                                <img src="{{asset('public/img/img-default.png')}}" class="w-100 view_image" height="100%">
                                <input type="file" name="foto" class="d-none upload_foto">
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
@include('upload-file-js');
@endpush