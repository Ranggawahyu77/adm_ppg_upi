@extends('layouts.main')
@section('title', 'User Admin')
@section('container')
  <div class="container-fluid shadow me-5 py-5 px-5">
    @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <div class="d-flex justify-content-end">
              <th></th>
            </div>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <div class="d-flex justify-content-end">
                  <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info me-2">Role</a>
                  <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
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