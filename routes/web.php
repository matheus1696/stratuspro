<?php

use App\Http\Controllers\Configuration\Region\RegionCityController;
use App\Http\Controllers\Configuration\Region\RegionCountryController;
use App\Http\Controllers\Configuration\Region\RegionStateController;
use App\Http\Controllers\Configuration\User\UserGenderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Rota de redirecionamento para a página de login
Route::get('/', function () { return redirect()->route('login'); });

//Rotas de Autenticação
Auth::routes();

//Usuário Autenciados
Route::middleware('auth')->group(function () {
    
    //Rota de Página Inicial
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Usuários Verificados
    Route::middleware('verified')->group(function () {
    
        Route::prefix('configuration')->group(function () {

            Route::prefix('user')->group(function () {
                //Rotas dos Países
                Route::get('genders', [UserGenderController::class, 'index'])->name('genders.index');
                Route::get('genders/update/{id}', [UserGenderController::class, 'update'])->name('genders.update');
            });

            Route::prefix('region')->group(function () {
                //Rotas dos Países
                Route::get('countries', [RegionCountryController::class, 'index'])->name('countries.index');
                Route::get('countries/update/{id}', [RegionCountryController::class, 'update'])->name('countries.update');
                //Rotas dos Estados
                Route::get('states', [RegionStateController::class, 'index'])->name('states.index');
                Route::get('states/update/{id}', [RegionStateController::class, 'update'])->name('states.update');
                //Rotas dos Países
                Route::get('cities', [RegionCityController::class, 'index'])->name('cities.index');
                Route::get('cities/update/{id}', [RegionCityController::class, 'update'])->name('cities.update');
            });
        });

    });
    
});