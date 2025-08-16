@extends('layouts.app')
@section('title','Tambah Departemen')
@section('content')
<h3>Tambah Departemen</h3>
<form method="POST" action="{{ route('departements.store') }}" class="bg-white p-3 rounded border">
  @csrf
  <div class="mb-3">
    <label class="form-label">Nama Departemen</label>
    <input type="text" name="departement_name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Max Clock-In (HH:MM)</label>
    <input type="time" name="max_clock_in_time" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Max Clock-Out (HH:MM)</label>
    <input type="time" name="max_clock_out_time" class="form-control" required>
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="{{ route('departements.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
