@extends('backend.partials.assets')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Seragam</h4>
    <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Seragam</h5>
                    <div class="card-body">
                      <div>
                        <form action="/backend/seragam/{{ $s->id }}" enctype="multipart/form-data" method="post" class="row g-3">
                          @method('put')
                          @csrf
                          <div class="col-md-6">
                            <label for="nama" class="form-label">Nama Seragam</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan Nama Seragam" value="{{old('nama',$s->nama)}}">
                            @error('nama')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="col-md-6">
                            <label for="category" class="form-label">Seragam Jurusan?</label>
                                <select class="form-select" aria-label="Default select example" name="jurusan_id">
                                @foreach ($jurusan as $j)
                                    @if (old('jurusan_id',$s->jurusan_id) == $j->id)
                                      <option value="{{ $j->id }}" selected>{{ $j->jurusan }}</option>
                                    @else
                                      <option value="{{ $j->id }}">{{ $j->jurusan }}</option>
                                    @endif
                                @endforeach
                                </select>
                          </div>
                          <div class="col-12">
                            <label class="col-sm-2 col-form-label" for="image" class="form-label">Foto Kaprodi</label>
                            <input class="form-control mb-3  @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
                            <input type="hidden" name="oldImage" value="{{ $s->image}}">
                            @if($s->image)
                            <img src="{{ asset('storage/' . $s->image) }}" alt="" class="img-preview img-fluid col-sm-5">
                            @else 
                            <img class="img-preview img-fluid col-sm-5">
                            @endif
                            <img class="img-preview img-fluid col-sm-5">
                             @error('image')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
                          <div class="text-end">
                            <a href="/backend/seragam"><button type="button" class="btn btn-outline-primary">Kembali</button></a>
                            <button type="submit" class="btn btn-primary" name="submit"><i class="bi bi-plus-lg"></i>  Simpan</button>
                          </div>
                        </form><!-- End Multi Columns Form -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
</div>
<script>
    function previewImage() {
      const image = document.querySelector ('#image');
      const imgPreview = document.querySelector ('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader .readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection