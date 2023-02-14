@extends('layouts.main')

@section('container')
  <h1 class="text-center">Kegiatan</h1>
  <form action="/kegiatan/{{ $kegiatan->id_kegiatan }}" method="POST">
    @method('put')
    @csrf
    <div class="col-lg-8">
      <div class="mb-3">
        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
        <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan" name="nama_kegiatan" required autofocus value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}">
        @error('nama_kegiatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
        @enderror
      </div>
    </div>
    
    <div class="col-lg-8">
      <div class="mb-3">
        <label for="tempat_kegiatan" class="form-label">Tempat Kegiatan</label>
        <input type="text" class="form-control @error('tempat_kegiatan') is-invalid @enderror" id="tempat_kegiatan" name="tempat_kegiatan" required value="{{ old('tempat_kegiatan', $kegiatan->tempat_kegiatan) }}">
        @error('tempat_kegiatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
        @enderror
      </div>
    </div>
    
    <div class="col-lg-8">
      <div class="mb-3">
        <label for="tgl_kegiatan" class="form-label">Tanggal Mulai</label>
        <input type="date" name="tgl_kegiatan" class="form-control @error('tgl_kegiatan') is-invalid @enderror" id="tgl_kegiatan" value="{{ old('tgl_kegiatan', $kegiatan->tgl_kegiatan) }}">
        @error('tgl_kegiatan')
          <div class="invalid-feedback">
            {{ $message }}
          </div> 
        @enderror
      </div>
    </div>
    
    <div class="col-lg-8">
      <div class="mb-3">
        <label for="tgl_berakhir" class="form-label">Tanggal Berakhir</label>
        <input type="date" name="tgl_berakhir" class="form-control" id="tgl_berakhir" value="{{ old('tgl_berakhir', $kegiatan->tgl_berakhir) }}">
      </div>
    </div>



    <button type="submit" class="btn btn-danger mb-3">Update</button>
  </form>
    
@endsection