@extends('backend.partials.assets')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Alamat</h4>
    <div class="row">
        <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Alamat</h5>
            <div class="card-body">
            <div>
                <form action="/backend/alamat" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                    <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror " placeholder="...." name="alamat" id="editor" >{{ old('alamat')}}</textarea>
                        @error('alamat')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                </div>
                <div class="col-6">
                    <label class=" col-form-label" for="telp" class="form-label">No Telepon</label>
                    <input class="form-control mb-3  @error('telp') is-invalid @enderror" placeholder="+62" name="telp" type="text" id="telp">
                    @error('telp')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <label class=" col-form-label" for="email" class="form-label">E-Mail</label>
                    <input class="form-control mb-3  @error('email') is-invalid @enderror" name="email" placeholder="SMKFarmako@gmail.com" type="text" id="email">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="text-end">
                    <a href="/backend/alamat"><button type="button" class="btn btn-outline-primary">Kembali</button></a>
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