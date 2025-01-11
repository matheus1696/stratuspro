<?php

use App\Http\Controllers\Configuration\Region\RegionCityController;
use App\Http\Controllers\Configuration\Region\RegionCountryController;
use App\Http\Controllers\Configuration\Region\RegionStateController;
use App\Http\Controllers\Configuration\User\UserGenderController;
use App\Http\Controllers\Managenment\User\UserController;
use App\Http\Controllers\Managenment\Business\Contract\BusinessContractController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//Rota de redirecionamento para a página de login
Route::get('/', function () { return redirect()->route('login'); });

//Usuário Autenciados
Route::middleware('auth')->group(function () {

    //Rotas de Usuários
    Route::prefix('profile')->group(function () {
        Route::get('personal', [ProfileController::class, 'editPersonal'])->name('profiles.editPersonal');
        Route::get('professional', [ProfileController::class, 'editProfessional'])->name('profiles.editProfessional');
        Route::get('password', [ProfileController::class, 'editPassword'])->name('profiles.editPassword');

        Route::put('personal/{user}', [ProfileController::class, 'updatePersonal'])->name('profiles.updatePersonal');
        Route::put('professional/{user}', [ProfileController::class, 'updateProfessional'])->name('profiles.updateProfessional');
        Route::put('password/{user}', [ProfileController::class, 'updatePassword'])->name('profiles.updatePassword');
    });

    //Usuários Verificados
    Route::middleware('verified')->group(function () {        
    
        //Rota de Página Inicial
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        
        //Rotas de Gerenciamento
        Route::prefix('managenment')->group(function () {
            
            //Rotas de Usuários
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'index'])
                    ->name('users.index')
                    ->middleware('permission:managenment_users');

                Route::put('users/permission/{user}', [UserController::class, 'permission'])
                    ->name('users.permission')
                    ->middleware('permission:managenment_users');
            });

            //Rotas de Contratos
            Route::prefix('contract')->group(function () {
                Route::get('/', [BusinessContractController::class, 'index'])->name('contracts.index')->middleware('permission:managenment_contracts');
                Route::get('create', [BusinessContractController::class, 'create'])->name('contracts.create')->middleware('permission:managenment_contracts');
                Route::post('store', [BusinessContractController::class, 'store'])->name('contracts.store')->middleware('permission:managenment_contracts');
                Route::get('edit/{business_contract}', [BusinessContractController::class, 'edit'])->name('contracts.edit')->middleware('permission:managenment_contracts');
                Route::put('update/{business_contract}', [BusinessContractController::class, 'update'])->name('contracts.update')->middleware('permission:managenment_contracts');
                Route::get('show/{business_contract}', [BusinessContractController::class, 'show'])->name('contracts.show')->middleware('permission:managenment_contracts');
            });
        });
    
        //Rotas de Configuração
        Route::prefix('configuration')->group(function () {

            //Rotas de Usuários
            Route::prefix('user')->group(function () {
                //Rotas de Configuração dos Gêneros
                Route::get('genders', [UserGenderController::class, 'index'])
                    ->name('genders.index')
                    ->middleware('permission:configuration_users');

                Route::put('genders/update/{user_gender}', [UserGenderController::class, 'update'])
                    ->name('genders.update')
                    ->middleware('permission:configuration_users');
            });

            //Rotas de Regiões
            Route::prefix('region')->group(function () {
                //Rotas dos Países
                Route::get('countries', [RegionCountryController::class, 'index'])
                    ->name('countries.index')
                    ->middleware('permission:configuration_regions');

                Route::put('countries/update/{region_country}', [RegionCountryController::class, 'update'])
                    ->name('countries.update')
                    ->middleware('permission:configuration_regions');

                //Rotas dos Estados
                Route::get('states', [RegionStateController::class, 'index'])
                    ->name('states.index')
                    ->middleware('permission:configuration_regions');

                Route::put('states/update/{region_state}', [RegionStateController::class, 'update'])
                    ->name('states.update')
                    ->middleware('permission:configuration_regions');

                //Rotas dos Países
                Route::get('cities', [RegionCityController::class, 'index'])
                    ->name('cities.index')
                    ->middleware('permission:configuration_regions');

                Route::put('cities/update/{region_city}', [RegionCityController::class, 'update'])
                    ->name('cities.update')
                    ->middleware('permission:configuration_regions');
            });
        });

    });
    
});

require __DIR__.'/auth.php';
