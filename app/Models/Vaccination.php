<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    // columns that can be filled with create()
    protected $fillable = ['patient_name', 'purok', 'vaccine', 'dose', 'scheduled_at', 'status'];

    // treat scheduled_at as a date
    protected $casts = ['scheduled_at' => 'date'];
}
