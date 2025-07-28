@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1>Kelola Portfolio</h1>
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary mb-3">Tambah Portfolio</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Judul</th>
        <th>Link</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($portfolios as $p)
      <tr>
        <td>
          @if($p->image_filename)
            <img src="{{ asset('images/'.$p->image_filename) }}" width="100" alt="{{ $p->title }}">
          @endif
        </td>
        <td>{{ $p->title }}</td>
        <td>
          @if($p->project_link)
            <a href="{{ $p->project_link }}" target="_blank">Lihat</a>
          @endif
        </td>
        <td>
          <a href="{{ route('admin.portfolios.edit', $p) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('admin.portfolios.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin dihapus?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $portfolios->links() }}
</div>
@endsection
