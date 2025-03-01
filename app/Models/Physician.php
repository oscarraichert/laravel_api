<?php

namespace App\Models;

use App\Enums\Specialization;
use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'specialization' => Specialization::class,
        ];
    }
}
