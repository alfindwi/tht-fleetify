<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceHistories extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attendance_id',
        'date_attendance',
        'attendance_type',
        'description',
    ];

    public function attendance(){
        $this->belongsTo(Attendances::class, 'attendance_id', 'attendance_id');
    }

    public function employee(){
        $this->belongsTo(Employees::class, 'employee_id', 'employee_id');
    }
}
