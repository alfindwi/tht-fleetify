<?php

namespace App\Http\Controllers;

use App\Models\Attendances;
use App\Models\AttendanceHistories;
use App\Models\Departements;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttendancesController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->date ?? Carbon::today()->toDateString();
        $departmentId = $request->department_id;

        $query = Attendances::with(['employees', 'employees.departement']);

        if ($date) {
            $query->whereDate('clock_in', $date);
        }

        if ($departmentId) {
            $query->whereHas('employees', function ($q) use ($departmentId) {
                $q->where('department_id', $departmentId);
            });
        }

        $attendances = $query->get();
        $departments = Departements::all();

        return view('attendances.index', compact('attendances', 'departments', 'date', 'departmentId'));
    }

    public function clockIn(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
        ]);

        $attendances = Attendances::create([
            'employee_id'   => $request->employee_id,
            'attendance_id' => Str::uuid(),
            'clock_in'      => Carbon::now(),
        ]);

        AttendanceHistories::create([
            'employee_id'    => $request->employee_id,
            'attendance_id'  => $attendances->attendance_id,
            'date_attendance' => Carbon::now(),
            'attendance_type' => 1,
            'description'    => 'Clock In',
        ]);

        return redirect()->route('attendances.index')->with('success', 'Absen masuk berhasil!');
    }

    public function clockOut(Request $request, $attendanceId)
    {
        $attendance = Attendances::where('attendance_id', $attendanceId)
            ->where('employee_id', $request->employee_id)
            ->firstOrFail();

        $attendance->update([
            'clock_out' => Carbon::now(),
        ]);

        AttendanceHistories::create([
            'employee_id'    => $request->employee_id,
            'attendance_id'  => $attendance->attendance_id,
            'date_attendance' => Carbon::now(),
            'attendance_type' => 2,
            'description'    => 'Clock Out',
        ]);

        return redirect()->route('attendances.index')->with('success', 'Absen keluar berhasil!');
    }
}
