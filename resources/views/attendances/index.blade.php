@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Log Absensi</h2>

    <form action="{{ route('attendances.in') }}" method="POST" class="mb-3">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee ID</label>
            <input type="text" name="employee_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Absen Masuk</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Departemen</th>
                <th>Clock In</th>
                <th>Clock Out</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                @php
                    $dept = $attendance->employees->departement;
                    $status = '';
                    if ($attendance->clock_in && $attendance->clock_in > $dept->max_clock_in_time) {
                        $status .= 'Terlambat';
                    }
                    if ($attendance->clock_out && $attendance->clock_out < $dept->max_clock_out_time) {
                        $status .= 'Pulang Cepat';
                    }
                    if ($status == '') {
                        $status = 'Tepat Waktu';
                    }
                @endphp

                <tr>
                    <td>{{ $attendance->employees->name }}</td>
                    <td>{{ $dept->departement_name }}</td>
                    <td>{{ $attendance->clock_in }}</td>
                    <td>{{ $attendance->clock_out }}</td>
                    <td>{{ $status }}</td>
                    <td>
                        @if(!$attendance->clock_out)
                        <form action="{{ route('attendances.out', $attendance->attendance_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="employee_id" value="{{ $attendance->employee_id }}">
                            <button type="submit" class="btn btn-success">Absen Keluar</button>
                        </form>
                        @else
                            Sudah Pulang
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
