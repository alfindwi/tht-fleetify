@extends('layouts.app')
@section('title','Edit Departemen')
@section('content')
<h3>Edit Departemen</h3>
<form method="POST" action="{{ route('departements.update',$departement->id) }}" class="bg-white p-3 rounded border">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Departemen</label>
        <input type="text" name="departement_name" class="form-control" value="{{ old('departement_name',$departement->departement_name) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Max Clock-In</label>
        <input type="time" name="max_clock_in_time" class="form-control" value="{{ old('max_clock_in_time',substr($departement->max_clock_in_time,0,5)) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Max Clock-Out</label>
        <input type="time" name="max_clock_out_time" class="form-control" value="{{ old('max_clock_out_time',substr($departement->max_clock_out_time,0,5)) }}" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('departements.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection