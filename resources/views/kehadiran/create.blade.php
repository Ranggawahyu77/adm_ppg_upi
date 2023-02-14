<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Peserta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <!-- Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  </head>
  <body>
    <div class="container my-5 shadow py-5 px-4">
      <h1 class="text-center mb-5">BIODATA</h1>
        
      <form action="{{ route('kehadiran.store', $kegiatan->id_kegiatan) }}" method="POST">
        @csrf
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required autofocus>
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="gender" name="gender">
              <option selected disabled value="">Pilih...</option>
              <option value="laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
    
        </div>
    
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}">
          @error('nik')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        
    
    
        <div class="row g-3 mb-3">
          <div class="col-md-4">
            <label for="tempat_lhr" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lhr') is-invalid @enderror" id="tempat_lhr" name="tempat_lhr" value="{{ old('tempat_lhr') }}">  
            @error('tempat_lhr')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
    
          <div class="col-md-4">
            <label for="tanggal_lhr" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lhr') is-invalid @enderror" id="tanggal_lhr" name="tanggal_lhr" value="{{ old('tanggal_lhr') }}">
            @error('tanggal_lhr')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
    
          <div class="col-md-4">
            <label for="golongan" class="form-label">Golongan / Pangkat</label>
            <select class="form-select" id="golongan" name="golongan">
              <option selected disabled value="">Pilih...</option>
              <optgroup label="Golongan I">
                <option value="1a">I.A / Juru Muda</option>
                <option value="1b">I.B / Juru Muda Tk.1</option>
                <option value="1c">I.C / Juru</option>
                <option value="1d">I.D / Juru Tk.1</option>
              </optgroup>
              <optgroup label="Golongan II">
                <option value="2a">I.A / Pengatur Muda</option>
                <option value="2b">II.B / Pengatur Muda Tk.1</option>
                <option value="2c">II.C / Pengatur</option>
                <option value="2d">II.D / Pengatur Tk.1</option>
              </optgroup>
              <optgroup label="Golongan III">
                <option value="3a">III.A / Penata Muda</option>
                <option value="3b">III.B / Penata Muda Tk.1</option>
                <option value="3c">III.C / Penata</option>
                <option value="3d">III.D / Penata Tk.1</option>
              </optgroup>
              <optgroup label="Golongan IV">
                <option value="4a">IV.A / Pembina</option>
                <option value="4b">IV.B / Pembina Tk.1</option>
                <option value="4c">IV.C / Pembina Muda</option>
                <option value="4d">IV.D / Pembina Madya</option>
                <option value="4e">IV.E / Pembina Utama</option>
              </optgroup>
            </select>
          </div>
        </div>
    
    
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
            @error('jabatan')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
    
          <div class="col-md-6">
            <label for="instansi" class="form-label">Asal Instansi</label>
            <input type="text" class="form-control @error('instansi') is-invalid @enderror" id="instansi" name="instansi" value="{{ old('instansi') }}">
            @error('instansi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
    
    
        <div class="mb-3">
          <label for="alamat_instansi" class="form-label">Alamat Instansi</label>
          <textarea class="form-control @error('alamat_instansi') is-invalid @enderror" id="alamat_instansi" name="alamat_instansi" rows="3">{{ old('alamat_instansi') }}</textarea>
          @error('alamat_instansi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
    
    
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
    
          <div class="col-md-6">
            <label for="no_hp" class="form-label">No.HP / Telepon</label>
            <div class="input-group has-validation">
              <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
              @error('no_hp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
    
    
        <div class="mb-3">
          <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
          <textarea class="form-control @error('alamat_rumah') is-invalid @enderror" id="alamat_rumah" rows="3" name="alamat_rumah">{{ old('alamat_rumah') }}</textarea>
          @error('alamat_rumah')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
    
    
        <div class="mb-3">
          <label for="no_npwp" class="form-label">No. NPWP</label>
          <input type="text" class="form-control @error('no_npwp') is-invalid @enderror" id="no_npwp" name="no_npwp" value="{{ old('no_npwp') }}">
          @error('no_npwp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
    
    
        <div class="row g-3 mb-3">
          <div class="col-md-6">
            <label for="nama_bank" class="form-label">Nama Bank</label>
            <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" id="nama_bank" name="nama_bank" value="{{ old('nama_bank') }}">
            @error('nama_bank')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
    
          <div class="col-md-6">
            <label for="no_rek" class="form-label">No. Rekening</label>
            <input type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" name="no_rek" value="{{ old('no_rek') }}">
            @error('no_rek')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn btn-danger my-5">Selanjutnya</button>
        </form>

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  </body>
</html>