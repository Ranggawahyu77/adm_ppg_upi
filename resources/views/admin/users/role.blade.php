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
  
  <div class="mb-5">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-success shadow-sm">Role Index</a>
  </div>
  <div>
    <!-- Detail User -->
    <div class="p-3 bg-light">
      <div>User Name : {{ $user->name }}</div>
      <div>User Email : {{ $user->email }}</div>
    </div>

    <!-- Edit Permission in Role -->
    <div class="mt-5 p-3 bg-light">
      <h2 class="fw-semibold">Roles</h2>
      <div class="d-flex">
        @if ($user->roles)
          @foreach ($user->roles as $user_role)
          <form class="px-3 py-2" method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" onsubmit="return confirm('Are you sure to remove this role?');">
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-danger">{{ $user_role->name }}</button>
          </form>
          @endforeach
        @endif
      </div>

      <div class="mt-3">
        <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
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

    <!-- Edit Role in Permission -->
    <div class="mt-5 p-3 bg-light">
      <h2 class="fw-semibold">Role Permission</h2>
      <div class="d-flex">
        @if ($user->permissions)
          @foreach ($user->permissions as $user_permission)
          <form class="px-3 py-2" method="POST" action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" onsubmit="return confirm('Are you sure to revoke this permission?');">
            @csrf
            @method('DELETE')
              <button type="submit" class="btn btn-danger">{{ $user_permission->name }}</button>
          </form>
          @endforeach
        @endif
      </div>

      <div class="mt-3">
        <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
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

  </div>
@endsection