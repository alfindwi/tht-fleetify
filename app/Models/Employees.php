<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'departement_id',
        'address',
    ];

    public function departement()
    {
        return $this->belongsTo(Departements::class, 'departement_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class, 'employee_id', 'employee_id');
    }
}
