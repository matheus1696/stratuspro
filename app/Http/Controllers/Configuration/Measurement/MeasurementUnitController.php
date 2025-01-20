<?php

namespace App\Http\Controllers\Configuration\Measurement;

use App\Http\Controllers\Controller;
use App\Models\Configuration\Measurement\MeasurementUnit;
use Illuminate\Http\Request;

class MeasurementUnitController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:configuration_users']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.configuration.measurement.measurement-unit-index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MeasurementUnit $measurementUnit)
    {
        //
        $measurementUnit->update($request->all());
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
