@extends('backend.partials.asset')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3"><span class="text-muted fw-light">Data /</span> Seragam</h4>
    <a href="seragam/create"><button type="button" class="btn rounded-pill btn-outline-primary mb-3">
        <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Tambah
    </button></a>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($seragam as $g)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('storage/'. $g->image)}}" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">{{$g->nama}}</h5>
                        <p class="card-text">
                           {{$g->jurusan->jurusan}}
                        </p>
                        <a href="/backend/seragam/{{ $g->id }}/edit"><button type="button" class="btn btn-primary" ><i class="bi bi-pencil-fill"></i> Ubah</button></a>
                        <form action="/backend/seragam/{{ $g->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm ('are you sure?')"><i class="bi bi-trash3-fill"></i>Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
</div>    
@endsection