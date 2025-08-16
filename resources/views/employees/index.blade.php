@extends('layouts.app')

@section('content')
<h1>employees</h1>
<a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add employees</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>employees ID</th>
            <th>Name</th>
            <th>Departement</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->employee_id }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->departement->departement_name }}</td>
            <td>{{ $employee->address }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
