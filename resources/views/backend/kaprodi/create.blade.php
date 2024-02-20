@extends('backend.partials.assets')
@section('container')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Kaprodi</h4>
    <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Kaprodi</h5>
                    <div class="card-body">
                      <div>
                        <form action="/backend/kaprodi" enctype="multipart/form-data" method="post" class="row g-3">
                          @csrf
                          <div class="col-md-12">
                            <label for="nama" class="form-label">nama</label>
                             <input type="text" class="form-control @error('nama') is-invalid @enderror " placeholder="...." name="nama" value="{{ old('nama')}}">
                              @error('nama')
                              <p class="text-danger">{{$message}}</p>
                              @enderror
                          </div>
                          <div class="col-md-12">
                            <label for="Caption" class="form-label">Caption</label>
                             <textarea class="form-control @error('caption') is-invalid @enderror " placeholder="...." name="caption" id="editor" >{{ old('caption')}}</textarea>
                              @error('caption')
                              <p class="text-danger">{{$message}}</p>
                              @enderror
                          </div>
                          <div class="col-12">
                            <label class="col-sm-2 col-form-label" for="image" class="form-label">Foto Kaprodi</label>
                            <input class="form-control mb-3  @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            <img class="img-preview img-fluid col-sm-5">
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

   <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
        console.error( error );
        } );
    </script>

@endsection