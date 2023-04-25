<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctors";
    protected $fillable = [
        'id',
        'name',
        'phone',
        'speciality',
        'room_id',
        'image'
    ];

    protected function speciality(): Attribute {
        return Attribute::make(
            get: fn (string $value) => array_search($value, config('constraint.speciality'))
        );
    }
}
