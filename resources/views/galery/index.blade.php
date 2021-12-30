@extends('app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Galery</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <a href="{{url('tambah-galery')}}" class="btn btn-info" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus-circle"></i> Tambah</a>
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
                <div class="row row-cols-sm-4">
                    @foreach($galery as $key)
                    <div class="col">
                        <div class="img-control">
                            <div class="img">
                                <img src="{{asset('public/galery/'.$key->image)}}" alt="">
                                <div class="control">
                                    <div class="button">
                                        <!-- <button type="button" class=""><i class="fas fa-pen"></i></button> -->
                                        <button type="button" class="delete-img" data-id="{{$key->id}}"><i class="fas fa-trash"></i></button>
                                        <button type="button" data-img="{{asset('public/galery/'.$key->image)}}" class="img-detail"><i class="fas fa-eye"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@include('galery.modal')
@push('js')
@include('upload-file-js')
<script>
    $(document).ready(function() {
        $('.img-detail').click(function(e) {
            var src = $(this).data('img');
            $('#modal-show').find('img').attr('src', src);
            $('#modal-show').modal('show');
        });
        $('.delete-img').click(function(e) {
            var id = $(this).data('id');
            $.ajax({
                type: "get",
                url: "{{url('admin-galery-delete')}}/" + id,
                dataType: "JSON",
                success: function(response) {
                    window.location.href = '{{url("admin-galery")}}';
                }
            });

        });

        $('.delete-img').click(function() {
            var id = $(this).data("id");
            Swal.fire({
                title: 'Do you want to save the deleted?',
                showCancelButton: true,
                confirmButtonText: 'Save',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{url('admin-galery-hapus')}}/" + id;
                }
            });

        });
    });
</script>
@endpush
@endsection