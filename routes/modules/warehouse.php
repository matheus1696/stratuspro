<?php

use App\Http\Controllers\Warehouse\WarehouseInventoryController;
use App\Http\Controllers\Warehouse\WarehouseStorageController;
use App\Http\Controllers\Warehouse\WarehouseProductController;
use Illuminate\Support\Facades\Route;

//Rotas de Warehouse
Route::prefix('warehouse')->group(function () {

    //Rotas de Configuração do Centro de Distribuição
    Route::middleware('permission:warehouse_storage_configurations')->group(function () {
        Route::get('storage', [WarehouseStorageController::class, 'index'])->name('warehouse_storages.index');
        Route::get('storage/create', [WarehouseStorageController::class, 'create'])->name('warehouse_storages.create');
        Route::post('storage/store', [WarehouseStorageController::class, 'store'])->name('warehouse_storages.store');
        Route::get('storage/{warehouse_storage}/show', [WarehouseStorageController::class, 'show'])->name('warehouse_storages.show');
        Route::get('storage/{warehouse_storage}/edit', [WarehouseStorageController::class, 'edit'])->name('warehouse_storages.edit');
        Route::put('storage/{warehouse_storage}/update', [WarehouseStorageController::class, 'update'])->name('warehouse_storages.update');
        Route::put('storage/{warehouse_storage}/is_active', [WarehouseStorageController::class, 'is_active'])->name('warehouse_storages.is_active');
        Route::get('storage/{warehouse_storage}/permission/{user}', [WarehouseStorageController::class, 'permission'])->name('warehouse_storages.permission');
        Route::get('storage/{warehouse_storage}/revoke/{user}', [WarehouseStorageController::class, 'revoke'])->name('warehouse_storages.revoke');
    });

    //Rotas de Configuração do Centro de Distribuição
    Route::middleware('permission:warehouse_product_configurations')->group(function () {
        Route::get('product', [WarehouseProductController::class, 'index'])->name('warehouse_products.index');
        Route::get('product/create', [WarehouseProductController::class, 'create'])->name('warehouse_products.create');
        Route::post('product/store', [WarehouseProductController::class, 'store'])->name('warehouse_products.store');
        Route::get('product/{warehouse_product}/edit', [WarehouseProductController::class, 'edit'])->name('warehouse_products.edit');
        Route::put('product/{warehouse_product}/update', [WarehouseProductController::class, 'update'])->name('warehouse_products.update');
        Route::put('product/{warehouse_product}/is_active', [WarehouseProductController::class, 'is_active'])->name('warehouse_products.is_active');
    });

    //Rotas de Configuração do Centro de Distribuição
    Route::middleware('permission:warehouse_inventory_managenment')->group(function () {
        Route::get('inventory', [WarehouseInventoryController::class, 'index'])->name('warehouse_inventories.index');
        Route::get('inventory/create/storage/{warehouse_storage}', [WarehouseInventoryController::class, 'create'])->name('warehouse_inventories.create');
        Route::get('inventory/show/storage/{warehouse_storage}', [WarehouseInventoryController::class, 'show'])->name('warehouse_inventories.show');
    });
});
