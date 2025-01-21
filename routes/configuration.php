<?php

//Rotas de Configuração

use App\Http\Controllers\Configuration\Company\CompanyEstablishmentController;
use App\Http\Controllers\Configuration\Measurement\MeasurementUnitController;
use App\Http\Controllers\Configuration\Region\RegionCityController;
use App\Http\Controllers\Configuration\Region\RegionCountryController;
use App\Http\Controllers\Configuration\Region\RegionStateController;
use App\Http\Controllers\Configuration\User\UserGenderController;
use Illuminate\Support\Facades\Route;

Route::prefix('configuration')->group(function () {

    Route::middleware('permission:configuration_users')->group(function () {
        //Rotas de Usuários
        Route::prefix('user')->group(function () {
            //Rotas de Configuração dos Gêneros
            Route::get('genders', [UserGenderController::class, 'index'])->name('genders.index');
            Route::put('genders/update/{user_gender}', [UserGenderController::class, 'update'])->name('genders.update');
        });
    });

    Route::middleware('permission:configuration_measurement_unit')->group(function () {
        Route::prefix('measurement')->group(function () {
            //Rotas de Configuração de Unidade de Medidas
            Route::get('units', [MeasurementUnitController::class, 'index'])->name('measurement_units.index');
            Route::put('units/update/{measurement_unit}', [MeasurementUnitController::class, 'update'])->name('measurement_units.update');
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

    Route::middleware('permission:configuration_company_establishment')->group(function () {
        Route::prefix('company')->group(function () {
            //Rotas de Configuração de Unidade de Medidas
            Route::get('establishments', [CompanyEstablishmentController::class, 'index'])->name('establishments.index');
            Route::get('establishments/create', [CompanyEstablishmentController::class, 'create'])->name('establishments.create');
            Route::post('establishments/store', [CompanyEstablishmentController::class, 'store'])->name('establishments.store');
            Route::get('establishments/{establishment}/show', [CompanyEstablishmentController::class, 'show'])->name('establishments.show');
            Route::get('establishments/{establishment}/edit', [CompanyEstablishmentController::class, 'edit'])->name('establishments.edit');
            Route::put('establishments/{establishment}/update', [CompanyEstablishmentController::class, 'update'])->name('establishments.update');
            Route::put('establishments/{establishment}/is_active', [CompanyEstablishmentController::class, 'is_active'])->name('establishments.is_active');
        });
    });
});
