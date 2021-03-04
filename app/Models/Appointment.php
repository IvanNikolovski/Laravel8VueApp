<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'has_occured', 'patient_name', 'time_from', 'time_to'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
