<?php

namespace App\Http\Controllers;

use App\Models\MBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CBerita extends Controller
{

    public function index()
    {
        $berita = MBerita::where('deleted', 1)->get();
        return view('berita.index')->with('berita', $berita);
    }
    public function create()
    {
        return view('berita.add');
    }
    public function saveCreate(Request $request)
    {
        $mBerita = new MBerita;

        $mBerita = $this->credentials($request, $mBerita);
        $mBerita->save();
        return redirect(url('admin-berita'))->with('msg', 'Selamat data berhasil di tambahkan');
    }
    public function show($id)
    {
        $MBerita = MBerita::where('id', $id)->where('deleted', 1)->first();
        return view('berita.edit')->with('berita', $MBerita);
    }
    public function saveShow($id, Request $request)
    {
        $berita = MBerita::where('id', $id)->where('deleted', 1)->first();
        $berita = $this->credentials($request, $berita);
        $berita->update();
        return redirect(url('admin-berita'))->with('msg', 'Selamat data berhasil di ubah');
    }
    public function detail($id)
    {
        $MBerita = MBerita::where('id', $id)->where('deleted', 1)->first();
        return view('berita.detail')->with('berita', $MBerita);
    }
    public function destroy($id)
    {
        $mberita = MBerita::where('id', $id)->where('deleted', 1)->first();
        $mberita->deleted = 0;
        $mberita->update();
        return redirect(url('admin-berita'))->with('msg', 'Selamat data berhasil di hapus');
    }
    public function credentials(Request $request, $model)
    {
        if ($this->uploadFoto($request) != null) {

            $model->cover = $this->uploadFoto($request);
        }
        $model->judul_berita = $request->input('judul');
        $model->deskripsi = $request->input('deskripsi');
        $model->publish = $request->input('publish');
        $model->aktif = $request->input('aktif');
        return $model;
    }
    public function uploadFoto(Request $request)
    {
        $foto  = $request->file('cover');
        $fileName = null;
        if ($request->hasFile('cover')) {

            $fileName = $foto->getClientOriginalName();
            $path = Storage::putFileAs(
                'cover_berita',
                $foto,
                $fileName
            );
        }
        return $fileName;
    }
}
