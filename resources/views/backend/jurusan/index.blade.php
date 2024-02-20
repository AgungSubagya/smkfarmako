@extends('backend.partials.asset')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
 <h4 class="fw-bold py-3"><span class="text-muted fw-light">Data /</span> Jurusan</h4>
    <button
            type="button"
            class="btn btn-primary mb-3"
            data-bs-toggle="modal"
            data-bs-target="#backDropModal"
        ><span class="tf-icons bx bx-edit-alt"></span>&nbsp; Tambah Jurusan
    </button>
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
        <form class="modal-content" method="post" action="/backend/jurusan">
        @csrf
            <div class="modal-header">
            <h5 class="modal-title" id="backDropModalTitle">Jurusan</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameBackdrop" class="form-label">Nama Jurusan</label>
                        <input class="form-control mb-3  @error('jurusan') is-invalid @enderror" type="text" name="jurusan" placeholder="Jurusan">
                        @error('jurusan')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="sumbit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Data</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nama Kejuruan</th>
                    <th>Ubah / Hapus</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach ($jurusan as $j)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$j->jurusan}}</strong></td>
                    <td>
                        <a href="/backend/jurusan/{{ $j->id }}/edit"><button type="button" class="btn rounded-pill btn-icon btn-outline-primary">
                        <span class="tf-icons bx bx-edit-alt"></span></button></a>
                        <form action="/backend/jurusan/{{ $j->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf 
                        <button onclick="return confirm ('are you sure?')" class="btn rounded-pill btn-icon btn-outline-danger">
                        <span class="tf-icons bx bx-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection