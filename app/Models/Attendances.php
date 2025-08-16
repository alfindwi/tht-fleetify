<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attendance_id',
        'clock_in',
        'clock_out',
    ];

    public function employees()
    {
        return $this->belongsTo(Employees::class, 'employee_id', 'employee_id');
    }

    public function history()
    {
        return $this->hasMany(AttendanceHistories::class, 'attendance_id', 'attendance_id');
    }
}
