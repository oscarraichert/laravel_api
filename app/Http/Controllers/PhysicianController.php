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

    public function store(Request $request)
    {
        $physician = new Physician;

        $physician->name = $request->name;
        $physician->specialization = $request->specialization;

        $physician->save();

        return $physician;
    }

    public function update(Request $request, Physician $physician)
    {
        //
    }

    public function destroy(Physician $physician)
    {
        //
    }
}
