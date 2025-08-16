@extends('layouts.app')
@section('title','Tambah Karyawan')
@section('content')
<h3>Tambah Karyawan</h3>
<form method="POST" action="{{ route('employees.store') }}" class="bg-white p-3 rounded border">
  @csrf
  <div class="mb-3">
    <label class="form-label">employees ID</label>
    <input type="text" name="employee_id" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Departemen</label>
    <select name="departement_id" class="form-select" required>
      <option value="">-- Pilih --</option>
      @foreach($departements as $d)
      <option value="{{ $d->id }}">{{ $d->departement_name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <input type="text" name="address" class="form-control" required>
  </div>
  <button class="btn btn-success">Simpan</button>
  <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection