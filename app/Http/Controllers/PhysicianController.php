<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhysicianResource;
use App\Models\Physician;
use Illuminate\Http\Request;

class PhysicianController extends Controller
{
    public function index()
    {
        return PhysicianResource::collection(Physician::get());
    }

    public function show(int $id)
    {
        $patient = Physician::find($id);

        if (empty($patient)) {
            return response()->json(["message" => "patient id {$id} not found"], 404);
        }

        return new PhysicianResource($patient);
    }

    public function store(Request $request)
    {
        $physician = new Physician;

        $physician->name = $request->name;
        $physician->specialization = $request->specialization;

        $physician->save();

        return $physician;
    }

    public function update(Request $request, int $id)
    {
        $physician = Physician::find($id);

        $physician->name = $request->name;
        $physician->specialization = $request->specialization;

        $physician->save();

        return $physician;
    }

    public function destroy(int $id)
    {
        $physician = Physician::find($id);

        if (empty($physician)) {
            return response()->json(["message" => "physician id {$id} not found."], 404);
        }

        $physician->delete();
        return response(null, 204);
    }
}
