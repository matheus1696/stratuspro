<?php

use App\Http\Controllers\Warehouse\WarehouseStorageController;
use Illuminate\Support\Facades\Route;

//Rotas de Warehouse
Route::prefix('warehouse')->group(function () {

    //Rotas de Configuração do Centro de Distribuição
    Route::middleware('permission:warehouse_storages_configuration')->group(function () {
        Route::get('storage', [WarehouseStorageController::class, 'index'])->name('warehouse_storages.index');
        Route::get('storage/create', [WarehouseStorageController::class, 'create'])->name('warehouse_storages.create');
        Route::post('storage/store', [WarehouseStorageController::class, 'store'])->name('warehouse_storages.store');
        Route::get('storage/{warehouse_storage}/show', [WarehouseStorageController::class, 'show'])->name('warehouse_storages.show');
        Route::get('storage/{warehouse_storage}/edit', [WarehouseStorageController::class, 'edit'])->name('warehouse_storages.edit');
        Route::put('storage/{warehouse_storage}/update', [WarehouseStorageController::class, 'update'])->name('warehouse_storages.update');
        Route::put('storage/{warehouse_storage}/is_active', [WarehouseStorageController::class, 'is_active'])->name('warehouse_storages.is_active');
        Route::get('storage/{warehouse_storage}/permission/{user}', [WarehouseStorageController::class, 'permission'])->name('warehouse_storages.permission');
    });

    //Rotas de Configuração do Centro de Distribuição
    //Route::middleware('permission:configuration_warehouses')->group(function () {
    //    Route::get('item', [WarehouseItemController::class, 'index'])->name('warehouse_items.index');
    //   Route::get('item/create', [WarehouseItemController::class, 'create'])->name('warehouse_items.create');
    //    Route::post('item/store', [WarehouseItemController::class, 'store'])->name('warehouse_items.store');
    //    Route::get('item/{warehouse_item}/edit', [WarehouseItemController::class, 'edit'])->name('warehouse_items.edit');
    //    Route::put('item/{warehouse_item}/update', [WarehouseItemController::class, 'update'])->name('warehouse_items.update');
    //    Route::put('item/{warehouse_item}/is_active', [WarehouseItemController::class, 'is_active'])->name('warehouse_items.is_active');
    //});
});
