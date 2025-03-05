<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return AppointmentResource::collection(Appointment::all())->collection;
    }

    public function store(Request $request)
    {
        $appointment = new Appointment;

        $appointment->date = $request->date;
        $appointment->patient_id = $request->patient_id;
        $appointment->physician_id = $request->physician_id;

        $appointment->save();

        return $appointment;
    }

    public function show(string $id)
    {
        return new AppointmentResource(Appointment::find($id));
    }

    public function update(Request $request, string $id)
    {
        $appointment = Appointment::find($id);

        $appointment->patient_id = $request->patient_id;
        $appointment->physician_id = $request->physician_id;
        $appointment->date = $request->date;

        $appointment->save();

        return $appointment;
    }

    public function destroy(string $id)
    {
        $appointment = Appointment::find($id);

        $appointment->delete();
        return response(null, 204);
    }
}
