<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttedancesHistoryController extends Controller
{
    public function logs(Request $request)
    {
        $date = $request->query('date');
        $departement_id = $request->query('departement_id');

        $query = DB::table('attendances as a')
            ->join('employees as e', 'a.employee_id', '=', 'e.employee_id')
            ->join('departements as d', 'e.departement_id', '=', 'd.id')
            ->select(
                'e.employee_id',
                'e.name as employee_name',
                'd.departement_name',
                'a.clock_in',
                'd.max_clock_in_time',
                'a.clock_out',
                'd.max_clock_out_time',
                DB::raw('CASE WHEN TIME(a.clock_in) <= d.max_clock_in_time THEN "Tepat Waktu" ELSE "Terlambat" END as clock_in_status'),
                DB::raw('CASE WHEN TIME(a.clock_out) <= d.max_clock_out_time THEN "Tepat Waktu" ELSE "Pulang Cepat" END as clock_out_status')
            );

        if ($departement_id) {
            $query->where('d.id', $departement_id);
        }

        if ($date) {
            $query->whereDate('a.clock_in', $date);
        }

        $logs = $query->get();

        $departements = DB::table('departements')->get();

        return view('attendances.history', compact('logs', 'departements'));
    }
}
