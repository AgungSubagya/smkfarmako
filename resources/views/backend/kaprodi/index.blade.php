@extends('backend.partials.asset')
@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3"><span class="text-muted fw-light">Data /</span> Kaprodi</h4>
        <a href="kaprodi/create"><button type="button" class="btn rounded-pill btn-outline-primary mb-3">
            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Tambah Kaprodi
        </button></a>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach ($kaprodi as $g)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('storage/'. $g->image)}}" alt="Card image cap" />
                    <div class="card-body">
                        <h5 class="card-title">Caption:</h5>
                        <p class="card-text">
                            {!! Str::limit($g->caption, 10,) !!}
                        </p>
                        <a href="/backend/kaprodi/{{ $g->id }}/edit"><button type="button" class="btn btn-primary" ><i class="bi bi-pencil-fill"></i> Ubah</button></a>
                        <form action="/backend/kaprodi/{{ $g->id }}" method="post" class="d-inline">
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