<?php

namespace App\Http\Controllers;

use App\Models\Departements;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {   
        $departements = Departements::all();
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        return view('departements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'departement_name' => 'required|string|max:255',
            'max_clock_in_time' => 'required|date_format:H:i',
            'max_clock_out_time' => 'required|date_format:H:i',
        ]);

        Departements::create($request->all());

        return redirect()->route('departements.index')->with('success', 'Departements created successfully.');
    }

    public function show($id)
    {
        $departement = Departements::findOrFail($id);
        return view('departements.show', compact('departement'));
    }

    public function edit($id)
    {
        $departement = Departements::findOrFail($id);
        return view('departements.edit', compact('departement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'departement_name' => 'required|string|max:255',
            'max_clock_in_time' => 'required|date_format:H:i',
            'max_clock_out_time' => 'required|date_format:H:i',
        ]);

        $departement = Departements::findOrFail($id);
        $departement->update($request->all());

        return redirect()->route('departements.index')->with('success', 'Departements updated successfully.');
    }

    public function destroy($id)
    {
        $departement = Departements::findOrFail($id);
        $departement->delete();

        return redirect()->route('departements.index')->with('success', 'Departements deleted successfully.');
    }
}
