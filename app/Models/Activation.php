<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $fillable = [
        'customer_id',
        'technician_id',
        'status',
        'installation_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }
}