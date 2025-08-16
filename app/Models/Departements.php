<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departements extends Model
{
    use HasFactory;

    protected $fillable = [
        'departement_name',
        'max_clock_in_time',
        'max_clock_out_time',
    ];

    public function employees()
    {
        return $this->hasMany(Employees::class, 'departement_id', 'id');
    }
}
