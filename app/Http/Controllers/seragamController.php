<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\seragam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class seragamController extends Controller
{
    
    public function index()
    {
        return view('backend.seragam.index',[
            'seragam' => seragam::all(),
            'title' => 'seragam',
            'ac' => 'kejuruan',
        ]);
    }

   
    public function create()
    {
        return view('backend.seragam.create',[
            'title' => 'seragam',
            'ac' => 'kejuruan',
            'jurusan' => Jurusan::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jurusan_id' => 'required',
            'image' => 'required|image|file|max:5024'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('seragam-images');
        }

        seragam::create ($validatedData);
        Alert::success('Berhasil', 'Seragam Ditambah');
        return redirect('/backend/seragam');
    }

   
    public function show(seragam $seragam)
    {
        //
    }

    public function edit(seragam $seragam)
    {
        return view('backend.seragam.edit',[
            's' => $seragam,
            'title' => 'seragam',
            'ac' => 'kejuruan',
            'jurusan' => Jurusan::all()
        ]);
    }

    public function update(Request $request, seragam $seragam)
    {
        $rules = [
            'nama' => 'required|max:100',
            'jurusan_id' => 'required',
            'image' => 'required|image|file|max:8024'
        ];
        
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('seragam-images');
        }

        seragam::where ('id', $seragam->id)
        ->update($validatedData);
        Alert::success('Berhasil', 'Seragam Diubah');
        return redirect('/backend/seragam');
    }

    public function destroy(seragam $seragam)
    {
        if ($seragam->image){
            Storage::delete($seragam->image);
        }
        seragam::destroy($seragam->id);
        Alert::success('Berhasil', 'Seragam Dihapus');
        return redirect('/backend/seragam');
    }
}
