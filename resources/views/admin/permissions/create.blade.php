@extends('layouts.main')
@section('title', 'Admin Permission')
@section('container')
<div class="container-fluid shadow me-5 py-5 px-5">
  <div class="mb-5">
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-success shadow-sm">Permission Index</a>
  </div>
  <div>
    <form method="POST" action="{{ route('admin.permissions.store') }}">
    @csrf
      <div class="my-3">
        <label for="name" class="form-label"> Permission name </label>
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