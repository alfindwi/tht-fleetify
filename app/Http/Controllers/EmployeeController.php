<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use App\Models\employees;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = employees::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departements::all();
        return view('employees.create', compact('departements'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "employee_id" => "required|string|max:50|unique:employees",
            "departement_id" => "required|exists:departements,id",
            "name" => "required|string|max:255",
            "address" => "required|string",
        ]);

        $employees = employees::create($request->all());
        return redirect()->route('employees.index', compact('employees'))->with('success', 'employees created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employees = employees::find($id);
        return view('employees.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        @$departements = Departements::all();
        $employees = employees::find($id);
        return view('employees.edit', compact('employees', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "departement_id" => "required|exists:departements,id",
            "name" => "required|string|max:255",
            "address" => "required|string",
        ]);

        $employees = employees::find($id);
        $employees->update($request->all());
        return redirect()->route('employees.index')->with('success', 'employees updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $employees = employees::find($id);
        $employees->delete();
        return redirect()->route('employees.index')->with('success', 'employees deleted successfully.');
    }
}
