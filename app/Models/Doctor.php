<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'speciality', 'is_active', 'institution', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
