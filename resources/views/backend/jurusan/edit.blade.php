@extends('backend.partials.assets')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Jurusan</h4>
    <div class="row">
        <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Jurusan</h5>
            <div class="card-body">
            <div>
                <form action="/backend/jurusan/{{$j->id}}" method="post" class="row g-3">
                @method('put')
                @csrf
                <div class="col-md-12">
                    <label for="jurusan" class="form-label">Nama Jurusan</label>
                        <input class="form-control @error('jurusan') is-invalid @enderror" placeholder="...." name="jurusan" type="text" value="{{old('jurusan',$j->jurusan)}}">
                        @error('jurusan')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                </div>
                <div class="text-end">
                    <a href="/backend/jurusan"><button type="button" class="btn btn-outline-primary">Kembali</button></a>
                    <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-plus-lg"></i>  Simpan</button>
                </div>
                </form><!-- End Multi Columns Form -->
            </div>
            </div>
        </div>
        </div>
    </div>  
</div>
@endsection