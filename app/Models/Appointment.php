<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'clinic_id', 'doctor_name', 'en_doctor_name', 'day', 'time'
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
