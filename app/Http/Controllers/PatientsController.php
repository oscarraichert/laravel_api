<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {
        return PatientResource::collection(Patient::all());
    }

    public function show(int $id)
    {
        $patient = Patient::find($id);

        if (empty($patient)) {
            return response()->json(["message" => "patient id {$id} not found"], 404);
        }

        return new PatientResource($patient);
    }

    public function store(Request $request)
    {
        $patient = new Patient;

        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;

        $patient->save();

        return $patient;
    }

    public function update(Request $request, int $id)
    {
        $patient = Patient::find($id);

        if (empty($patient)) {
            return response()->json(["message" => "patient id {$id} not found"], 404);
        }

        $patient->name = $request->name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;

        $patient->save();

        return $patient;
    }

    public function destroy(int $id)
    {
        $patient = Patient::find($id);

        if (empty($patient)) {
            return response()->json(["message" => "patient id {$id} not found."], 404);
        }

        $patient->delete();
        return response(null, 204);
    }
}
