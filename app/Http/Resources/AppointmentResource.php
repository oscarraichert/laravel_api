<?php

namespace App\Http\Resources;

use App\Models\Patient;
use App\Models\Physician;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    public static $wrap = false;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'patient' => new PatientResource(Patient::find($this->patient_id)),
            'physician' => new PhysicianResource(Physician::find($this->physician_id)),
            'date' => $this->date,
        ];
    }
}
