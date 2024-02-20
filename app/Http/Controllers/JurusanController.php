<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.jurusan.index',[
            'title' => 'jurusan',
            'ac' => 'kejuruan',
            'jurusan' =>Jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.jurusan.index',[
            'title' => 'jurusan',
            'ac' => 'kejuruan',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jurusan' => 'required|max:100',
            'slug' => 'unique:jurusans',
        ]);

        Jurusan::create ($validatedData);
        Alert::success('Berhasil', 'Jurusan DiTambahkan');
        return redirect('/backend/jurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('backend.jurusan.edit',[
            'j' => $jurusan,
            'title' => 'jurusan',
            'ac' => 'kejuruan',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $rules = [
            'jurusan' => 'required|max:100',
            'slug' => 'unique:categories',
        ];

        if ($request->slug != $jurusan->slug){
            $rules ['slug'] = 'required|unique:jurusans';
        }

        $validatedData = $request->validate($rules);

        Jurusan::where ('id', $jurusan->id)
                ->update($validatedData);
        Alert::success('Berhasil', 'Jurusan Diubah');
        return redirect('/backend/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id);
        Alert::success('Berhasil', 'Jurusan Dihapus');
        return redirect('/backend/jurusan');
    }
}
