<?php

namespace App\Http\Controllers\Configuration\Region;

use App\Http\Controllers\Controller;
use App\Models\Configuration\Region\RegionState;
use Illuminate\Http\Request;

class RegionStateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.configuration.region.region-state-index');
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegionState $regionState)
    {
        //
        $regionState->update($request->only('is_active'));
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
