<div class="modal" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog" role="document">
        <form action="{{url('admin-galery-tambah')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Galery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-foto d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
                    <div class="img-show d-block p-1 rounded bg-dark">
                        <img src="{{asset('public/img/img-default.png')}}" class="w-100 view_image" height="100%">
                        <input type="file" name="foto" class="d-none upload_foto">
                        <button type="button" class="btn btn-danger w-100 btn-upload-img">Upload Foto</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modal-show">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Show Galery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('public/img/img-default.png')}}" class="w-100 view_image" height="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>