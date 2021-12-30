<?php

namespace App\Http\Controllers;

use App\Models\MBerita;
use App\Models\MMenuCaffe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CMenuCaffe extends Controller
{
    public function index()
    {
        $menu = MMenuCaffe::where('deleted', 1)->get();

        return view('menu-caffe.index')->with('menu', $menu);
    }
    public function create()
    {
        return view('menu-caffe.add');
    }
    public function saveCreate(Request $request)
    {

        $mMenuCaffe = new MMenuCaffe;
        $mMenuCaffe = $this->credentials($request, $mMenuCaffe);
        $mMenuCaffe->save();
        return redirect(url('admin-menu-caffe'))->with('msg', 'Selamat data berhasil di tambahkan');
    }
    public function show($id)
    {
        $mMenuCaffe = MMenuCaffe::where('id', $id)->where('deleted', 1)->first();
        return view('menu-caffe.edit')->with('menu', $mMenuCaffe);
    }
    public function saveShow(Request $request, $id)
    {
        $mMenuCaffe = MMenuCaffe::where('id', $id)->where('deleted', 1)->first();
        $mMenuCaffe = $this->credentials($request, $mMenuCaffe);
        $mMenuCaffe->update();
        return redirect(url('admin-menu-caffe'))->with('msg', 'Selamat data berhasil di ubah');
    }
    public function destroy($id)
    {
        $mMenuCaffe = MMenuCaffe::where('id', $id)->first();
        unlink('storage/app/foto_menu/' . $mMenuCaffe->cover);
        $mMenuCaffe->deleted = 0;
        $mMenuCaffe->update();
        return redirect(url('admin-menu-caffe'))->with('msg', 'Selamat data berhasil di hapus');;
    }
    public function credentials(Request $request, $model)
    {

        $model->nama = $request->input('nama');
        $model->harga = $request->input('harga');
        $model->jenis = $request->input('jenis'); // makanan apa minuman

        if ($request->input('jenis') == 1) {
            //minuman
            $model->tipe = $request->input('tipe'); // panas apa dingin
        }

        if ($this->uploadFoto($request) != null) {
            $model->image = $this->uploadFoto($request);
        }
        return $model;
    }
    public function uploadFoto(Request $request)
    {
        $foto  = $request->file('foto');
        $fileName =  null;
        if ($request->hasFile('foto')) {
            $foto->getClientOriginalName();
            $path = Storage::putFileAs(
                'foto_menu',
                $foto,
                $fileName
            );
        }
        return $fileName;
    }
}
