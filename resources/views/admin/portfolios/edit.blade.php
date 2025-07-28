@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Edit Portfolio</h1>
  <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $portfolio->title) }}" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="description" class="form-control">{{ old('description', $portfolio->description) }}</textarea>
    </div>
    <div class="mb-3">
      <label>Link Project</label>
      <input type="url" name="project_link" class="form-control" value="{{ old('project_link', $portfolio->project_link) }}">
    </div>
    <div class="mb-3">
      <label>Gambar Saat Ini</label><br>
      @if($portfolio->image_filename)
        <img src="{{ asset('images/'.$portfolio->image_filename) }}" width="120" alt="">
      @endif
    </div>
    <div class="mb-3">
      <label>Ganti Gambar</label>
      <input type="file" name="image" class="form-control">
    </div>
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
