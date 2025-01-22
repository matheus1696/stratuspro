<?php

use App\Http\Controllers\Warehouse\WarehouseDistributionCenterController;
use App\Http\Controllers\Warehouse\WarehouseStockControlController;
use Illuminate\Support\Facades\Route;

Route::middleware('permission:user_profile')->group(function (){
    //Rotas de Warehouse
    Route::prefix('warehouse')->group(function () {
        Route::prefix('distribution')->group(function () {
            Route::get('centers', [WarehouseDistributionCenterController::class, 'index'])->name('distribution_centers.index');
            Route::get('centers/create', [WarehouseDistributionCenterController::class, 'create'])->name('distribution_centers.create');
            Route::post('centers/store', [WarehouseDistributionCenterController::class, 'store'])->name('distribution_centers.store');
            Route::get('centers/{warehouse_distribution_center}/edit', [WarehouseDistributionCenterController::class, 'edit'])->name('distribution_centers.edit');
            Route::put('centers/{warehouse_distribution_center}/update', [WarehouseDistributionCenterController::class, 'update'])->name('distribution_centers.update');
            Route::put('centers/{warehouse_distribution_center}/is_active', [WarehouseDistributionCenterController::class, 'is_active'])->name('distribution_centers.is_active');
        });

        Route::prefix('stock')->group(function () {
            Route::get('controls', [WarehouseStockControlController::class, 'index'])->name('stock_controls.index');
            Route::get('controls/create', [WarehouseStockControlController::class, 'create'])->name('stock_controls.create');
            Route::post('controls/store', [WarehouseStockControlController::class, 'store'])->name('stock_controls.store');
            Route::get('controls/{warehouse_stock_control}/edit', [WarehouseStockControlController::class, 'edit'])->name('stock_controls.edit');
            Route::put('controls/{warehouse_stock_control}/update', [WarehouseStockControlController::class, 'update'])->name('stock_controls.update');
            Route::put('controls/{warehouse_stock_control}/is_active', [WarehouseStockControlController::class, 'is_active'])->name('stock_controls.is_active');
        });
    });
});