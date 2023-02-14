@extends('layouts.main')
@section('title', 'Peserta')
@section('container')

<div class="container-fluid shadow me-5 py-5 ps-5">
  <a href="/kegiatan" class="btn btn-success shadow-sm"><i class="bi bi-arrow-bar-left"></i> Kembali</a>
  <h2 class="fw-semibold text-center">Detail Kegiatan</h2>
  <div class="table-responsive py-5">
    <table class="table table-hover table-borderless">
      <tr>
        <th >Nama Kegiatan</th>
        <td>:</td>
        <td>{{ $kegiatan->nama_kegiatan }}</td>
      </tr>
      <tr>
        <th>Tempat Kegiatan</th>
        <td>:</td>
        <td>{{ $kegiatan->tempat_kegiatan }}</td>
      </tr>
      <tr>
        <th>Tanggal Awal</th>
        <td>:</td>
        <td>{{ $kegiatan->tgl_kegiatan }}</td>
      </tr>
      <tr>
        <th>Tanggal Berakhir</th>
        <td>:</td>
        <td>{{ $kegiatan->tgl_berakhir }}</td>
      </tr>
      <tr>
        <th>Kode Kegiatan</th>
        <td>:</td>
        <td>{{ $kegiatan->kode_unik }}</td>
      </tr>
    </table>
  </div>
</div>


<div class="table-responsive container mt-5 shadow p-3 mb-5 bg-body rounded">
  <h2 class="fw-semibold text-center">Peserta yang Hadir</h2>
  
  <table id="example" class="table table-striped data-table" style="width:100%">
    <thead>
      <tr>
        <th scope="col">Nama</th>
        <th scope="col">Tanda Tangan</th>
        <th scope="col" style="width: 122.2px;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($kegiatan->participants as $participant)
      <tr>
        <td>{{ $participant->nama }}</td>
        <td>{{ $participant->tanda_tangan }}</td>
        <td>
          <a href="/kegiatan/{{ $kegiatan->id_kegiatan }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
          <a href="/kegiatan/{{ $kegiatan->id_kegiatan }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
          <form action="/kegiatan/{{ $kegiatan->id_kegiatan }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

@endsection

@push('datatable-js')
  <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/js/dataTables.bootstrap5.min.js"></script>
@endpush