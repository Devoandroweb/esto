@extends('app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Berita</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm">
                            <div class="alert alert-danger alert-foto d-none">Ukuran file tidak boleh lebih dari 1024kb</div>
                            <div class="img-show d-block p-1 rounded bg-dark w-100 mb-2">
                                @if($berita->cover == null || $berita->cover == "")
                                <img src="{{asset('public/img/img-default.png')}}" class="w-100 view_image" height="100%">
                                @else
                                <img src="{{asset('public/cover_berita')}}/{{$berita->cover}}" class="w-100 view_image" height="100%">
                                @endif
                                <input type="hidden" name="old-cover" class="d-none upload_foto" value="{{$berita->cover}}">
                                <input type="file" name="cover" class="d-none upload_foto" value="">
                                <!-- <button type="button" class="btn btn-danger w-100 btn-upload-img">Upload Foto</button> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Judul</label>
                                <div>
                                    {{$berita->judul_berita}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <div>
                                    <?= $berita->deskripsi ?>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
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
@include('upload-file-js');
@endpush

@endsection