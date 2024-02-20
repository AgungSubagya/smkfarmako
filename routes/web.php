<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\seragamController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('keluar', function (){
    Auth::logout();
    return redirect('login');
});

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/backend', function () {
    return view('backend/index',[
        "title" => "",
        'ac' => 'kejuruan'
    ]);
})->middleware('auth');

Route::resource('/backend/seragam', seragamController::class)->middleware('auth');
Route::resource('/backend/jurusan', JurusanController::class)->middleware('auth');
Route::resource('/backend/kaprodi', KaprodiController::class)->middleware('auth');
Route::resource('/backend/lab', LabController::class)->middleware('auth');
Route::resource('/backend/alamat', AlamatController::class)->middleware('auth');
