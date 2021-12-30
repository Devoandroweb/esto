@extends('app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Berita</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <a href="{{url('admin-tambah-berita')}}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah</a>
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
                @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Berita</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($berita as $key)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$key->judul_berita}}</td>
                            <td><img src="{{url('public/cover_berita').'/'.$key->cover}}" class="img-fluid" width="100px" alt=""></td>
                            <td>
                                <a href="#" data-id="{{$key->id}}" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt"></i> Hapus</a>
                                <a href="{{url('admin-show-berita')}}/{{$key->id}}" class="btn btn-sm btn-info"><i class="fas fa-pen"></i> Edit</a>
                                <a href="{{url('admin-detail-berita')}}/{{$key->id}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Detail</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(function() {
        $('table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $('.delete').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        Swal.fire({
            title: 'Do you want to save the deleted?',
            showCancelButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{url('admin-hapus-berita')}}/" + id;
            }
        });

    });
</script>
@endpush
@endsection