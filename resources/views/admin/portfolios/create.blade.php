@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Tambah Portfolio</h1>
  <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>
    <div class="mb-3">
      <label>Link Project</label>
      <input type="url" name="project_link" class="form-control" value="{{ old('project_link') }}">
    </div>
    <div class="mb-3">
      <label>Gambar</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
