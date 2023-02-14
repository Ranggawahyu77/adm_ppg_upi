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

  <div class="mb-5 p-2">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-success shadow-sm">Role Index</a>
  </div>

  <!-- Edit Role Name -->
  <div class="p-3 bg-light">
    <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
    @csrf
    @method('PUT')
      <div class="my-3">
        <label for="name" class="form-label"> Role name </label>
        <div class="col-lg-8">
          <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}"/>
        </div>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </form>
  </div>

  <!-- Edit Role in Permission -->
  <div class="mt-5 p-3 bg-light">
    <h2 class="fw-semibold">Role Permission</h2>
    <div class="d-flex">
      @if ($role->permissions)
        @foreach ($role->permissions as $role_permission)
        <form class="px-3 py-2" method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('Are you sure to revoke this permission?');">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-danger">{{ $role_permission->name }}</button>
        </form>
        @endforeach
      @endif
    </div>

    <div class="mt-3">
      <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
        @csrf
        <div class="col-sm-6">
          <label for="permission" class="form-label">Permission</label>
          <select id="permission" name="permission" autocomplete="permission-name" class="form-select">
            @foreach ($permissions as $permission)
              <option value="{{ $permission->name }}">{{ $permission->name }}</option>
            @endforeach
          </select>
          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-success">update</button>
        </div>
      </form>
    </div>
  </div>
@endsection