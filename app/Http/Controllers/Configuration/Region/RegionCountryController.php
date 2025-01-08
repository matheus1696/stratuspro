<?php

namespace App\Http\Controllers\Configuration\Region;

use App\Http\Controllers\Controller;
use App\Models\Region\RegionCountry;
use Illuminate\Http\Request;

class RegionCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('configuration.region.region-country-index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegionCountry $regionCountry)
    {
        //
        $regionCountry->update($request->all());
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
