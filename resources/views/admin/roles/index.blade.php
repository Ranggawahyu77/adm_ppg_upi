@extends('layouts.main')
@section('title', 'Admin Role')
@section('container')
  <div class="container-fluid shadow me-5 py-5 px-5">
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
      
    <div class="d-flex justify-content-end mb-3">
      <a href="{{ route('admin.roles.create') }}" class="btn btn-success shadow-sm"><i class="bi bi-pen"></i> Create Role</a>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <div class="d-flex justify-content-end">
              <th></th>
            </div>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->name }}</td>
              <td>
                <div class="d-flex justify-content-end">
                  <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-info me-2">Edit</a>
                  <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection