<?php

use App\Http\Controllers\Configuration\Warehouse\WarehouseListController;
use App\Http\Controllers\Warehouse\WarehouseDistributionCenterController;
use App\Http\Controllers\Warehouse\WarehouseStockControlController;
use Illuminate\Support\Facades\Route;

//Rotas de Warehouse
Route::prefix('warehouse')->group(function () {

    //Rotas de Configuração do Centro de Distribuição
    Route::middleware('permission:configuration_warehouses')->group(function () {
        Route::get('warehouses', [WarehouseListController::class, 'index'])->name('warehouses.index');
        Route::get('warehouses/create', [WarehouseListController::class, 'create'])->name('warehouses.create');
        Route::post('warehouses/store', [WarehouseListController::class, 'store'])->name('warehouses.store');
        Route::get('warehouses/{warehouse_list}/show', [WarehouseListController::class, 'show'])->name('warehouses.show');
        Route::get('warehouses/{warehouse_list}/edit', [WarehouseListController::class, 'edit'])->name('warehouses.edit');
        Route::put('warehouses/{warehouse_list}/update', [WarehouseListController::class, 'update'])->name('warehouses.update');
        Route::put('warehouses/{warehouse_list}/is_active', [WarehouseListController::class, 'is_active'])->name('warehouses.is_active');
        Route::put('warehouses/{warehouse_list}/permission', [WarehouseListController::class, 'permission'])->name('warehouses.permission');
    });

    //Rotas do Centro de Distribuição
    Route::prefix('distribution')->group(function () {
        
        //Rotas de Configuração do Centro de Distribuição
        Route::middleware('permission:configuration_distribution_centers')->group(function () {
            Route::get('centers', [WarehouseDistributionCenterController::class, 'index'])->name('distribution_centers.index');
            Route::get('centers/create', [WarehouseDistributionCenterController::class, 'create'])->name('distribution_centers.create');
            Route::post('centers/store', [WarehouseDistributionCenterController::class, 'store'])->name('distribution_centers.store');
            Route::get('centers/{warehouse_distribution_center}/show', [WarehouseDistributionCenterController::class, 'show'])->name('distribution_centers.show');
            Route::get('centers/{warehouse_distribution_center}/edit', [WarehouseDistributionCenterController::class, 'edit'])->name('distribution_centers.edit');
            Route::put('centers/{warehouse_distribution_center}/update', [WarehouseDistributionCenterController::class, 'update'])->name('distribution_centers.update');
            Route::put('centers/{warehouse_distribution_center}/is_active', [WarehouseDistributionCenterController::class, 'is_active'])->name('distribution_centers.is_active');
            Route::put('centers/{warehouse_distribution_center}/permission', [WarehouseDistributionCenterController::class, 'permission'])->name('distribution_centers.permission');
        });
        
    });

    //Rotas de Configuração do Estoque Local
    Route::prefix('stock')->group(function () {
        
        //Rotas de Configuração do Estoque Local
        Route::middleware('permission:configuration_stock_controls')->group(function () {
            Route::get('controls', [WarehouseStockControlController::class, 'index'])->name('stock_controls.index');
            Route::get('controls/create', [WarehouseStockControlController::class, 'create'])->name('stock_controls.create');
            Route::post('controls/store', [WarehouseStockControlController::class, 'store'])->name('stock_controls.store');
            Route::get('controls/{warehouse_stock_control}/show', [WarehouseStockControlController::class, 'show'])->name('stock_controls.show');
            Route::get('controls/{warehouse_stock_control}/edit', [WarehouseStockControlController::class, 'edit'])->name('stock_controls.edit');
            Route::put('controls/{warehouse_stock_control}/update', [WarehouseStockControlController::class, 'update'])->name('stock_controls.update');
            Route::put('controls/{warehouse_stock_control}/is_active', [WarehouseStockControlController::class, 'is_active'])->name('stock_controls.is_active');
            Route::put('controls/{warehouse_stock_control}/permission', [WarehouseStockControlController::class, 'permission'])->name('stock_controls.permission');
        });

    });
});
