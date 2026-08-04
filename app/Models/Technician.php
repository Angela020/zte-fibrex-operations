<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'department',
        'status',
    ];
}