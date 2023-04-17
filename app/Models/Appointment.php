<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = [
        'id', 'name', 'email', 'date', 'phone', 'doctor_id', 'message', 'status', 'user_id'
    ];

    protected function status(): Attribute {
        return Attribute::make(
            get: fn (int $value) => config('constraint.appointment_status')[$value]
        );
    }
}
