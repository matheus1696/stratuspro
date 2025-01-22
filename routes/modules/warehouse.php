<?php

use App\Http\Controllers\WarehouseDistributionCenterController;
use Illuminate\Support\Facades\Route;

Route::middleware('permission:user_profile')->group(function (){
    //Rotas de Warehouse
    Route::prefix('warehouse')->group(function () {
        Route::prefix('distribution')->group(function () {
            Route::get('centers', [WarehouseDistributionCenterController::class, 'index'])->name('distribution_centers.index');
            Route::get('centers/create', [WarehouseDistributionCenterController::class, 'create'])->name('distribution_centers.create');
            Route::post('centers/store', [WarehouseDistributionCenterController::class, 'store'])->name('distribution_centers.store');
            Route::get('centers/{distribution_center}/show', [WarehouseDistributionCenterController::class, 'show'])->name('distribution_centers.show');
            Route::get('centers/{distribution_center}/edit', [WarehouseDistributionCenterController::class, 'edit'])->name('distribution_centers.edit');
            Route::put('centers/{distribution_center}/update', [WarehouseDistributionCenterController::class, 'update'])->name('distribution_centers.update');
            Route::put('centers/{distribution_center}/is_active', [WarehouseDistributionCenterController::class, 'is_active'])->name('distribution_centers.is_active');
        });

        Route::prefix('stock')->group(function () {
            Route::get('controls', [WarehouseDistributionCenterController::class, 'index'])->name('stock_controls.index');
            Route::get('controls/create', [WarehouseDistributionCenterController::class, 'create'])->name('stock_controls.create');
            Route::post('controls/store', [WarehouseDistributionCenterController::class, 'store'])->name('stock_controls.store');
            Route::get('controls/{stock_control}/show', [WarehouseDistributionCenterController::class, 'show'])->name('stock_controls.show');
            Route::get('controls/{stock_control}/edit', [WarehouseDistributionCenterController::class, 'edit'])->name('stock_controls.edit');
            Route::put('controls/{stock_control}/update', [WarehouseDistributionCenterController::class, 'update'])->name('stock_controls.update');
            Route::put('controls/{stock_control}/is_active', [WarehouseDistributionCenterController::class, 'is_active'])->name('stock_controls.is_active');
        });
    });
});