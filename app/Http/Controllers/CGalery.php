<?php

namespace App\Http\Controllers;

use App\Models\MGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CGalery extends Controller
{
    public function index()
    {
        $galery = MGalery::where("deleted", 1)->get();
        return view('galery.index')->with("galery", $galery);
    }
    public function create(Request $request)
    {
        $mgalery = new MGalery;
        if ($this->uploadFoto($request) != null) {

            $mgalery->image = $this->uploadFoto($request);
        }
        $mgalery->save();
        return redirect(url('admin-galery'))->with("msg", "Berhasil Menambah Data");
    }
    public function destroy($id)
    {
        $galery = MGalery::where("id", $id)->first();
        // dd('storage/app/galery/' . $galery->image);
        unlink('storage/app/galery/' . $galery->image);
        $galery->deleted = 0;
        $galery->update();
        return redirect(url('admin-galery'))->with("msg", "Berhasil Menghapus Data");
        # code...
    }
    public function uploadFoto(Request $request)
    {
        $foto  = $request->file('foto');
        $fileName = null;
        if ($request->hasFile('foto')) {

            $fileName = $foto->getClientOriginalName();
            $path = Storage::putFileAs(
                'galery',
                $foto,
                $fileName
            );
        }
        return $fileName;
    }
}
