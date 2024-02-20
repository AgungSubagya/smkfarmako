@extends('backend.partials.asset')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3"><span class="text-muted fw-light">Data /</span> Alamat</h4>
              <a href="alamat/create"><button type="button" class="btn rounded-pill btn-outline-primary mb-3">
            <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Tambah Alamat
        </button></a>
              <div class="row">
                <div class="col-md mb-4 mb-md-0">
                  <div class="accordion mt-3" id="accordionExample">
                    <div class="card accordion-item active">
                      <h2 class="accordion-header" id="headingOne">
                        <button
                          type="button"
                          class="accordion-button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accordionOne"
                          aria-expanded="true"
                          aria-controls="accordionOne"
                        >
                          Alamat
                        </button>
                      </h2>

                      <div
                        id="accordionOne"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionExample"
                      >
                        @foreach ($a as $e)
                        <div class="accordion-body">
                          <strong>Alamat : </strong>{{$e->alamat}}
                          <br>
                          <strong>E-Mail : </strong>{{$e->email}}
                          <br>
                          <strong>Telepon : </strong>{{$e->telp}}
                          <br>
                            <div class="text-end">
                                <a href="/backend/alamat/{{ $e->id }}/edit"><button type="button" class="btn btn-primary mt-3" ><i class="bi bi-pencil-fill"></i> Ubah</button></a>
                                <form action="/backend/alamat/{{ $e->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger mt-3" onclick="return confirm ('are you sure?')"><i class="bi bi-trash3-fill"></i>Hapus</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Accordion -->

              <!--/ Advance Styling Options -->
            </div>
@endsection