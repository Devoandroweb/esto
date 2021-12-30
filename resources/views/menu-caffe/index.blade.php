@extends('app')
@section('content-header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Berita</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
                <a href="{{url('admin-menu-caffe-tambah')}}" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah</a>
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
                            <th>Image</th>
                            <th>Nama Menu</th>
                            <th>Jenis</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menu as $key)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{url('public/foto_menu').'/'.$key->image}}" class="img-fluid" width="100px" alt=""></td>

                            <td>{{$key->nama}}</td>
                            <td>{{($key->jenis == 1)?'Minuman':'Makanan'}}</td>
                            <td><?php
                                if ($key->jenis == 2) {
                                    echo "-";
                                } else {
                                    if ($key->tipe == 1) {
                                        echo 'Panas';
                                    } else {
                                        echo 'Dingin';
                                    };
                                }
                                ?>
                            </td>
                            <td>{{$key->harga}}</td>
                            <td></td>
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
    $(document).ready(function() {

    });
</script>
@endpush
@endsection