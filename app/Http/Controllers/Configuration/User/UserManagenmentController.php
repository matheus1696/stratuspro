<?php

namespace App\Http\Controllers\Configuration\User;

use App\Http\Controllers\Controller;

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
}
