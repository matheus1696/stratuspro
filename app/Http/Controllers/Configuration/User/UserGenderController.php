<?php

namespace App\Http\Controllers\Configuration\User;

use App\Http\Controllers\Controller;
use App\Models\User\UserGender;
use Illuminate\Http\Request;

class UserGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('configuration.user.user-gender-index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserGender $userGender)
    {
        //
        $userGender->update($request->all());
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
}
