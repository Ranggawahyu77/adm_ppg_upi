@extends('layouts.main')
@section('title', 'Admin Role')
@section('container')
<div class="container-fluid shadow me-5 py-5 px-5">
  <div class="mb-5">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-success shadow-sm">Role Index</a>
  </div>
  <div>
    <form method="POST" action="{{ route('admin.roles.store') }}">
    @csrf
      <div class="my-3">
        <label for="name" class="form-label"> Role name </label>
        <div class="col-lg-8">
          <input type="text" id="name" name="name" class="form-control"/>
        </div>
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Create</button>
      </div>
    </form>
  </div>
@endsection