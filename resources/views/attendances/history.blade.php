@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Kehadiran</h2>

    <form method="GET" action="{{ route('attendances.history') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="departement_id">Departemen</label>
                <select name="departement_id" class="form-control">
                    <option value="">-- Semua Departemen --</option>
                    @foreach($departements as $dept)
                        <option value="{{ $dept->id }}" {{ request('departement_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->departement_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="date">Tanggal</label>
                <input type="date" name="date" value="{{ request('date') }}" class="form-control">
            </div>
            <div class="col-md-4">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Departemen</th>
                <th>Clock In</th>
                <th>Status Masuk</th>
                <th>Clock Out</th>
                <th>Status Pulang</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
                <tr>
                    <td>{{ $log->employee_id }}</td>
                    <td>{{ $log->employee_name }}</td>
                    <td>{{ $log->departement_name }}</td>
                    <td>{{ $log->clock_in }}</td>
                    <td>{{ $log->clock_in_status }}</td>
                    <td>{{ $log->clock_out }}</td>
                    <td>{{ $log->clock_out_status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
