<?php

namespace App\Http\Controllers\Configuration\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagenmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('configuration.user.user-managenment-index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function permission(Request $request, User $user)
    {
        // Obtém as permissões enviadas no formulário
        $permissions = $request->input('permissions', []);

        // Sincroniza as permissões com o usuário
        $user->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Permissões atualizadas com sucesso!');
    }
}
