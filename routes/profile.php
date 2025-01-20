<?php

use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('permission:user_profile')->group(function (){
    //Rotas de Usuários
    Route::prefix('profile')->group(function () {
        Route::get('personal', [ProfileController::class, 'editPersonal'])->name('profiles.editPersonal');
        Route::get('professional', [ProfileController::class, 'editProfessional'])->name('profiles.editProfessional');
        Route::get('password', [ProfileController::class, 'editPassword'])->name('profiles.editPassword');

        Route::put('personal/{user}', [ProfileController::class, 'updatePersonal'])->name('profiles.updatePersonal');
        Route::put('professional/{user}', [ProfileController::class, 'updateProfessional'])->name('profiles.updateProfessional');
        Route::put('password/{user}', [ProfileController::class, 'updatePassword'])->name('profiles.updatePassword');
    });
});