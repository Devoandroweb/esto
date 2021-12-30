<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin-tambah-berita-simpan')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <div class="alert alert-danger alert-foto d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
                            <div class="img-show d-block p-1 rounded bg-dark w-100 mb-2">
                                <img src="{{asset('public/img/img_default_reactangle.png')}}" class="w-100 view_image">
                                <input type="file" name="cover" class="d-none upload_foto">
                                <button type="button" class="btn btn-danger w-100 btn-upload-img">Upload Foto</button>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Judul ... ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <textarea id="editor" name="deskripsi" class="form-control" id="" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Publish ?</label>
                                <div class="gruop">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio3" type="radio" name="publish" value="1">
                                        <label class="form-check-label" for="radio3">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio4" type="radio" name="publish" value="0">
                                        <label class="form-check-label" for="radio4">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Aktif ?</label>
                                <div class="gruop">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio5" type="radio" name="aktif" value="1">
                                        <label class="form-check-label" for="radio5">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="radio6" type="radio" name="aktif" value="0">
                                        <label class="form-check-label" for="radio6">Tidak</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>


                    <!-- /.card-body -->



                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{asset('/')}}public/plugins/ckeditor/ckeditor.js"></script>
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
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    });
</script>
@include('upload-file-js');
@endpush