<?php

use App\Http\Controllers\Configuration\Region\RegionCityController;
use App\Http\Controllers\Configuration\Region\RegionCountryController;
use App\Http\Controllers\Configuration\Region\RegionStateController;
use App\Http\Controllers\Configuration\User\UserGenderController;
use App\Http\Controllers\Managenment\User\UserController;
use App\Http\Controllers\Managenment\Business\Contract\BusinessContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Managenment\Business\Contract\BusinessContractItemController;
use Illuminate\Support\Facades\Route;

//Rota de redirecionamento para a página de login
Route::get('/', function () { return redirect()->route('login'); });

//Usuário Autenciados
Route::middleware('auth')->group(function () {
    
    require __DIR__.'/profile.php';

    //Usuários Verificados
    Route::middleware('verified')->group(function () {   
        
        require __DIR__.'/configuration.php';
    
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
                    Route::get('price/{business_contract}', [BusinessContractController::class, 'price'])->name('contracts.price');
                    
                    //Rotas de Contratos
                    Route::get('{business_contract}/item/create', [BusinessContractItemController::class, 'create'])->name('contract_items.create');
                    Route::post('{business_contract}/item/create', [BusinessContractItemController::class, 'store'])->name('contract_items.store');
                    Route::get('edit/item/{business_contract_item}', [BusinessContractItemController::class, 'edit'])->name('contract_items.edit');
                    Route::put('update/item/{business_contract_item}', [BusinessContractItemController::class, 'update'])->name('contract_items.update');
                });
                  
            });
        });

    });
    
});

require __DIR__.'/auth.php';
