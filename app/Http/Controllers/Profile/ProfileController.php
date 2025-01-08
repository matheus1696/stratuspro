<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfilePasswordUpdateRequest;
use App\Http\Requests\Profile\ProfilePersonalUpdateRequest;
use App\Http\Requests\Profile\ProfileProfessionalUpdateRequest;
use App\Models\User;
use App\Models\User\UserGender;

class ProfileController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:user_profile']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPersonal()
    {
        //Listando Dados
        $dbUser = Auth::user();
        $dbGenders = UserGender::where('is_active', true)->get();

        return view('profile.profile_personal', compact('dbUser','dbGenders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfessional()
    {
        //Listando Dados
        $dbUser = Auth::user();

        return view('profile.profile_professional', compact('dbUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPassword()
    {
        //Listando Dados
        $dbUser = Auth::user();

        return view('profile.profile_password', compact('dbUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePersonal(ProfilePersonalUpdateRequest $request, User $user)
    {
        //Removendo espaçõos em branco        
        trim($request['name']);

        //Alterando Dados do Usuário
        $user->update($request->only('name', 'birth_date', 'cpf', 'rg', 'phone_1', 'phone_2' ,'gender_id'));

        return redirect()->back()->with('success','Tudo certo! Suas informações pessoais foram atualizadas com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProfessional(ProfileProfessionalUpdateRequest $request, User $user)
    {
        $user->update($request->only('matriculation'));

        return redirect()->back()->with('success','Tudo pronto! Suas informações profissionais foram atualizadas com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePassword(ProfilePasswordUpdateRequest $request, User $user)
    {
        $user->update(['password' => Hash::make($request->input('password'))]);

        return redirect()->back()->with('success','Pronto! Sua senha foi alterada com sucesso!');
    }
}
