<?php

use App\Http\Controllers\Configuration\Region\RegionCityController;
use App\Http\Controllers\Configuration\Region\RegionCountryController;
use App\Http\Controllers\Configuration\Region\RegionStateController;
use App\Http\Controllers\Configuration\User\UserGenderController;
use App\Http\Controllers\Managenment\User\UserController;
use App\Http\Controllers\Managenment\Business\Contract\BusinessContractController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Managenment\Business\Contract\BusinessContractItemController;
use Illuminate\Support\Facades\Route;

//Rota de redirecionamento para a página de login
Route::get('/', function () { return redirect()->route('login'); });

//Usuário Autenciados
Route::middleware('auth')->group(function () {

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

    //Usuários Verificados
    Route::middleware('verified')->group(function () {        
    
        //Rota de Página Inicial
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        
        //Rotas de Gerenciamento
        Route::prefix('managenment')->group(function () {
            
            Route::middleware('permission:managenment_users')->group(function () {
                //Rotas de Usuários
                Route::prefix('users')->group(function () {
                    Route::get('/', [UserController::class, 'index'])->name('users.index');
                    Route::put('users/permission/{user}', [UserController::class, 'permission'])->name('users.permission');
                });                
            });

            Route::middleware('permission:managenment_contracts')->group(function () {
                //Rotas de Contratos
                Route::prefix('contract')->group(function () {
                    Route::get('/', [BusinessContractController::class, 'index'])->name('contracts.index');
                    Route::get('create', [BusinessContractController::class, 'create'])->name('contracts.create');
                    Route::post('store', [BusinessContractController::class, 'store'])->name('contracts.store');
                    Route::get('edit/{business_contract}', [BusinessContractController::class, 'edit'])->name('contracts.edit');
                    Route::put('update/{business_contract}', [BusinessContractController::class, 'update'])->name('contracts.update');
                    Route::get('show/{business_contract}', [BusinessContractController::class, 'show'])->name('contracts.show');
                    
                    //Rotas de Contratos
                    Route::get('{business_contract}/item/create', [BusinessContractItemController::class, 'create'])->name('contract_items.create');
                    Route::post('{business_contract}/item/create', [BusinessContractItemController::class, 'store'])->name('contract_items.store');
                    Route::get('edit/item/{business_contract_item}', [BusinessContractItemController::class, 'edit'])->name('contract_items.edit');
                    Route::put('update/item/{business_contract_item}', [BusinessContractItemController::class, 'update'])->name('contract_items.update');
                });

                  
            });
        });
    
        //Rotas de Configuração
        Route::prefix('configuration')->group(function () {

            Route::middleware('permission:configuration_users')->group(function() {
                //Rotas de Usuários
                Route::prefix('user')->group(function () {
                    //Rotas de Configuração dos Gêneros
                    Route::get('genders', [UserGenderController::class, 'index'])->name('genders.index');
                    Route::put('genders/update/{user_gender}', [UserGenderController::class, 'update'])->name('genders.update');
                });
            });

            Route::middleware('permission:configuration_regions')->group(function () {

                //Rotas de Regiões
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
    
});

require __DIR__.'/auth.php';
