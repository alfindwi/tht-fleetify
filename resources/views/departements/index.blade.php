@extends('layouts.app')
@section('title','Departemen')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0">Daftar Departemen</h3>
  <a href="{{ route('departements.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

<table class="table table-striped table-bordered bg-white">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Max Clock-In</th>
      <th>Max Clock-Out</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($departements as $d)
      <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->departement_name }}</td>
        <td>{{ $d->max_clock_in_time }}</td>
        <td>{{ $d->max_clock_out_time }}</td>
        <td class="d-flex gap-2">
          <a class="btn btn-sm btn-warning" href="{{ route('departements.edit',$d->id) }}">Edit</a>
          <form method="POST" action="{{ route('departements.destroy',$d->id) }}" onsubmit="return confirm('Hapus?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
