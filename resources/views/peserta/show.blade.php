@extends('layouts.main')
@section('title', 'Peserta')
@section('container')

<div class="container-fluid shadow me-5 py-5 ps-5">
  <a href="/participant" class="btn btn-success shadow-sm"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
  <h2 class="fw-semibold text-center my-5">Detail Peserta</h2>
  <div class="table-responsive">
    <table class="table table-hover table-borderless">
      <tr>
        <th >Nama</th>
        <td>:</td>
        <td>{{ $participant->nama }}</td>
      </tr>
      <tr>
        <th>NIK</th>
        <td>:</td>
        <td>{{ $participant->nik }}</td>
      </tr>
      <tr>
        <th>Tempat Lahir</th>
        <td>:</td>
        <td>{{ $participant->tempat_lhr }}</td>
      </tr>
      <tr>
        <th>Tanggal Lahir</th>
        <td>:</td>
        <td>{{ date('d-M-Y', strtotime($participant->tanggal_lhr)) }}</td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td>:</td>
        <td>{{ $participant->gender }}</td>
      </tr>
      <tr>
        <th>Pangkat, Golongan</th>
        <td>:</td>
        <td>{{ $participant->golongan }}</td>
      </tr>
      <tr>
        <th>Jabatan</th>
        <td>:</td>
        <td>{{ $participant->jabatan }}</td>
      </tr>
      <tr>
        <th>Instansi</th>
        <td>:</td>
        <td>{{ $participant->instansi }}</td>
      </tr>
      <tr>
        <th>Alamat Instansi</th>
        <td>:</td>
        <td>{{ $participant->alamat_instansi }}</td>
      </tr>
      <tr>
        <th>No Telp / HP</th>
        <td>:</td>
        <td>{{ $participant->no_hp }}</td>
      </tr>
      <tr>
        <th>Alamat Rumah</th>
        <td>:</td>
        <td>{{ $participant->alamat_rumah }}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>:</td>
        <td>{{ $participant->email }}</td>
      </tr>
      <tr>
        <th>NIK</th>
        <td>:</td>
        <td>{{ $participant->nik }}</td>
      </tr>
      <tr>
        <th>No NPWP</th>
        <td>:</td>
        <td>{{ $participant->no_npwp }}</td>
      </tr>
      <tr>
        <th>Nama Bank</th>
        <td>:</td>
        <td>{{ $participant->nama_bank }}</td>
      </tr>
      <tr>
        <th>No Rekening</th>
        <td>:</td>
        <td>{{ $participant->no_rek }}</td>
      </tr>
    </table>
  </div>
</div>

@endsection