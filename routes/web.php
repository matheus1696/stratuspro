<?php

use App\Http\Controllers\Configuration\Region\RegionCityController;
use App\Http\Controllers\Configuration\Region\RegionCountryController;
use App\Http\Controllers\Configuration\Region\RegionStateController;
use App\Http\Controllers\Configuration\User\UserGenderController;
use App\Http\Controllers\Configuration\User\UserManagenmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Rota de redirecionamento para a página de login
Route::get('/', function () { return redirect()->route('login'); });

//Usuário Autenciados
Route::middleware('auth')->group(function () {

    //Usuários Verificados
    Route::middleware('verified')->group(function () {        
    
        //Rota de Página Inicial
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        
        //Rotas de Gerenciamento
        Route::prefix('managenment')->group(function () {
            
            //Rotas de Usuários
            Route::prefix('users')->group(function () {
                Route::get('/', [UserManagenmentController::class, 'index'])->name('users.index');
                Route::put('users/permission/{user}', [UserManagenmentController::class, 'permission'])->name('users.permission');
            });
        });
    
        //Rotas de Configuração
        Route::prefix('configuration')->group(function () {

            Route::prefix('user')->group(function () {
                //Rotas dos Países
                Route::get('genders', [UserGenderController::class, 'index'])->name('genders.index');
                Route::put('genders/update/{user_gender}', [UserGenderController::class, 'update'])->name('genders.update');
            });

            Route::prefix('region')->group(function () {
                //Rotas dos Países
                Route::get('countries', [RegionCountryController::class, 'index'])->name('countries.index');
                Route::put('countries/update/{region_country}', [RegionCountryController::class, 'update'])->name('countries.update');
                //Rotas dos Estados
                Route::get('states', [RegionStateController::class, 'index'])->name('states.index');
                Route::put('states/update/{region_state}', [RegionStateController::class, 'update'])->name('states.update');
                //Rotas dos Países
                Route::get('cities', [RegionCityController::class, 'index'])->name('cities.index');
                Route::put('cities/update/{region_city}', [RegionCityController::class, 'update'])->name('cities.update');
            });
        });

    });
    
});

require __DIR__.'/auth.php';
