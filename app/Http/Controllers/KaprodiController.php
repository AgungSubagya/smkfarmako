<?php

namespace App\Http\Controllers;

use App\Models\Kaprodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KaprodiController extends Controller
{
    public function index()
    {
        return view('backend.kaprodi.index',[
            'title' => 'Kaprodi',
            'ac' => '',
            'kaprodi' => Kaprodi::all()
        ]);
    }

    public function create()
    {
        return view('backend.kaprodi.create',[
            'title' => 'Kaprodi',
            'ac' => '',
            'kaprodi' => Kaprodi::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caption' => 'max:200',
            'image' => 'required|image|file|max:5024',
            'nama' => 'required|max:200'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('kaprodi-images');
        }

        Kaprodi::create ($validatedData);
        Alert::success('Berhasil', 'kaprodi Ditambah');
        return redirect('/backend/kaprodi');
    }

    public function show(Kaprodi $kaprodi)
    {
        
    }

    public function edit(Kaprodi $kaprodi)
    {
        return view('backend.kaprodi.edit',[
            'title' => 'Kaprodi',
            'ac' => '',
            'k' => $kaprodi,
        ]);
    }

    public function update(Request $request, Kaprodi $kaprodi)
    {
        $rules = [
            'caption' => 'max:200',
            'nama' => 'required|max:200',
            'image' => 'required|image|file|max:5024'
        ];
        
        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('kaprodi-images');
        }

        Kaprodi::where ('id', $kaprodi->id)
        ->update($validatedData);
        Alert::success('Berhasil', 'kaprodi Diubah');
        return redirect('/backend/kaprodi');
    }

    public function destroy(Kaprodi $kaprodi)
    {
        if ($kaprodi->image){
            Storage::delete($kaprodi->image);
        }
        Kaprodi::destroy($kaprodi->id);
        Alert::success('Berhasil', 'kaprodi Dihapus');
        return redirect('/backend/kaprodi');
    }
}
