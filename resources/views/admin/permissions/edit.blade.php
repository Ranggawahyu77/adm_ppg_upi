@extends('layouts.main')
@section('title', 'Admin Permission')
@section('container')
<div class="container-fluid shadow me-5 py-5 px-5">
  @if (session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

  <div class="mb-5 p-2">
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-success shadow-sm">Permission Index</a>
  </div>

  <!-- Edit Permission Name -->
  <div class="p-3 bg-light">
    <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
    @csrf
    @method('PUT')
      <div class="my-3">
        <label for="name" class="form-label"> Permission name </label>
        <div class="col-lg-8">
          <input type="text" id="name" name="name" class="form-control" value="{{ $permission->name }}"/>
        </div>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </form>
  </div>

  <!-- Edit Permission in Role -->
  <div class="mt-5 p-3 bg-light">
    <h2 class="fw-semibold">Roles</h2>
    <div class="d-flex">
      @if ($permission->roles)
        @foreach ($permission->roles as $permission_role)
        <form class="px-3 py-2" method="POST" action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}" onsubmit="return confirm('Are you sure to remove this role?');">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-danger">{{ $permission_role->name }}</button>
        </form>
        @endforeach
      @endif
    </div>

    <div class="mt-3">
      <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
        @csrf
        <div class="col-sm-6">
          <label for="role" class="form-label">Role</label>
          <select id="role" name="role" autocomplete="role-name" class="form-select">
            @foreach ($roles as $role)
              <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
          </select>
          @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-success">Assign</button>
        </div>
      </form>
    </div>
  </div>
@endsection