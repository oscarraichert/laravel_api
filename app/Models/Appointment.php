<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    public function physician(): HasOne
    {
        return $this->hasOne(Physician::class);
    }
}
