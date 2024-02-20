<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Jurusan;
use App\Models\Kaprodi;
use App\Models\seragam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index',[
            'jurusan' => Jurusan::all(),
            'seragam' => seragam::all(),
            'k' => Kaprodi::all(),
            'a' => Alamat::all()
        ]);
    }
}
