<?php

namespace App\Http\Controllers\Configuration\Region;

use App\Http\Controllers\Controller;
use App\Models\Region\RegionCity;
use Illuminate\Http\Request;

class RegionCityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('configuration.region.region-city-index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegionCity $regionCity)
    {
        //
        $regionCity->update($request->all());
        return redirect()->back();        
    }
}