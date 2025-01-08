<?php

namespace App\Http\Controllers\Managenment\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagenmentController extends Controller
{
    /*
     * Controller access permission resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:managenment_users']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('managenment.user.user-managenment-index');
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
