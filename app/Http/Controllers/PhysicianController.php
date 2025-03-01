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
        $physician = Physician::find($id);

        return new PhysicianResource($physician);
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

        $physician->delete();
        return response(null, 204);
    }
}
