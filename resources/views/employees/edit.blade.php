@extends('layouts.app')
@section('title','Edit Karyawan')
@section('content')
<h3>Edit Karyawan</h3>
<form method="POST" action="{{ route('employees.update',$employees->id) }}" class="bg-white p-3 rounded border">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">employees ID</label>
    <input type="text" name="employee_id" class="form-control" value="{{ old('employee_id',$employees->employee_id) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Departemen</label>
    <select name="departement_id" class="form-select" required>
      @foreach($departements as $d)
        <option value="{{ $d->id }}" @selected(old('departement_id',$employees->departement_id)==$d->id)>
          {{ $d->departement_name }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name',$employees->name) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <input type="text" name="address" class="form-control" value="{{ old('address',$employees->address) }}" required>
  </div>
  <button class="btn btn-success">Update</button>
  <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
