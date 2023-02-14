@extends('layouts.main')
@section('title', 'Dashboard Kegiatan')

@section('container')
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
    <h1>Dashboard Kegiatan</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-8 my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="container my-3">
    <a href="/kegiatan/create" class="btn btn-danger shadow-sm"><i class="bi bi-pen"></i> Buat Kegiatan Baru</a>
  </div>

  <div class="table-responsive container mt-2 shadow p-3 mb-5 bg-body rounded">
  
    <table id="example" class="table table-striped data-table" style="width:100%">
      <thead>
        <tr>
          <th scope="col">Nama Kegiatan</th>
          <th scope="col">Tempat Kegiatan</th>
          <th scope="col">Tanggal Awal</th>
          <th scope="col">Tanggal Berakhir</th>
          <th scope="col">Kode Kegiatan</th>
          <th scope="col" style="width: 122.2px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kegiatans as $kegiatan)
        <tr>
          <td>{{ $kegiatan->nama_kegiatan }}</td>
          <td>{{ $kegiatan->tempat_kegiatan }}</td>
          <td>{{ $kegiatan->tgl_kegiatan }}</td>
          <td>{{ $kegiatan->tgl_berakhir }}</td>
          <td>{{ $kegiatan->kode_unik }}</td>
          <td>
            <a href="/kegiatan/{{ $kegiatan->id_kegiatan }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="/kegiatan/{{ $kegiatan->id_kegiatan }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <form action="/kegiatan/{{ $kegiatan->id_kegiatan }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-x-circle"></i></button>
            </form>
            <a href="/kegiatan/{{ $kegiatan->id_kegiatan }}/print" class="badge bg-dark"><i class="bi bi-printer"></i></a>
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