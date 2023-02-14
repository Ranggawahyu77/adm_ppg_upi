<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Peserta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  </head>
  <body>

    <div class="container">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4 m-auto shadow">

          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show col-lg-8 my-3 w-100" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <form action="{{ route('kehadiran.post', $kegiatan->id_kegiatan) }}" method="POST">
            @csrf
            
            <div class="p-5">
              <label class="form-label" for="nik">Masukkan NIK anda</label>
              <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ request('nik') }}">
              @error('nik')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

              <button type="submit" class="btn btn-danger mt-3">Next</button>
              
            </div>
          </form>

          
          
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>