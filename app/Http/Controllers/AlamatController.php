<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AlamatController extends Controller
{

    public function index()
    {
        return view('backend.alamat.index',[
            'title' => 'alamat',
            'a' => Alamat::all(),
            'ac' => ''
        ]);
    }

    public function create()
    {
        return view('backend.alamat.create',[
            'title' => 'alamat',
            'alamat' => Alamat::all(),
            'ac' => ''
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'telp' => 'required|max:200',
            'alamat' => 'required',
            'email' => 'required|max:524',
        ]);

        Alamat::create ($validatedData);
        Alert::success('Berhasil', 'Alamat DiTambahkan');
        return redirect('/backend/alamat');
    }

    public function show(Alamat $alamat)
    {
        //
    }

    public function edit(Alamat $alamat)
    {
        return view('backend.alamat.edit',[
            'a' => $alamat,
            'title' => 'alamat',
            'ac' => ''
        ]);
    }

    public function update(Request $request, Alamat $alamat)
    {
        $rules = [
            'telp' => 'required|max:200',
            'alamat' => 'required',
            'email' => 'required|max:524',
        ];
        
        $validatedData = $request->validate($rules);

        Alamat::where ('id', $alamat->id)
        ->update($validatedData);
        Alert::success('Berhasil', 'Alamat Diubah');
        return redirect('/backend/alamat');
    }

    public function destroy(Alamat $alamat)
    {
        Alamat::destroy($alamat->id);
        Alert::success('Berhasil', 'Alamat Dihapus');
        return redirect('/backend/alamat');
    }
}
