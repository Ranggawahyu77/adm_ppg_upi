@extends('layouts.main')
@section('title', 'Peserta')

@section('container')
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-5 border-bottom">
    <h1>Daftar Peserta</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-8 my-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="container my-3">
    <a href="/participant/create" class="btn btn-danger shadow-sm"><i class="bi bi-pen"></i> Buat Biodata Baru</a>
  </div>

  <div class="table-responsive container mt-2 shadow p-3 mb-5 bg-body rounded">
  
    <table id="example" class="table table-striped data-table" style="width:100%">
      <thead>
        <tr>
          <th scope="col" style="width: 250.2px;">Nama Lengkap</th>
          <th scope="col" style="width: 150.2px;">NIK</th>
          <th scope="col" style="width: 250.2px;">Asal Instansi</th>
          <th scope="col" style="width: 180.2px;">No HP / Telp</th>
          <th scope="col" style="width: 122.2px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($participants as $participant)
        <tr>
          <td>{{ $participant->nama }}</td>
          <td>{{ $participant->nik }}</td>
          <td>{{ $participant->instansi }}</td>
          <td>{{ $participant->no_hp }}</td>
          <td>
            <a href="/participant/{{ $participant->nik }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
            <a href="/participant/{{ $participant->nik }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
            <form action="/participant/{{ $participant->nik }}" method="POST" class="d-inline">
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