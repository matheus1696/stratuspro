<?php

namespace App\Http\Controllers\Warehouse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Warehouse\WarehouseStorageStoreRequest;
use App\Http\Requests\Warehouse\WarehouseStorageUpdateRequest;
use App\Models\Warehouse\WarehousePermission;
use App\Models\User;
use App\Models\Warehouse\WarehouseStorage;
use Illuminate\Http\Request;

class WarehouseStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.warehouse.storage.storage-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.warehouse.storage.storage-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseStorageStoreRequest $request)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseStorage = WarehouseStorage::create($request->all());

        return redirect()->route('warehouse_storages.show', $warehouseStorage->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseStorage $warehouseStorage)
    {
        //
        $dbWarehouseStorage = $warehouseStorage->id;

        return view('pages.warehouse.storage.storage-show', compact('dbWarehouseStorage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WarehouseStorage $warehouseStorage)
    {
        //
        $dbWarehouseStorage = $warehouseStorage->id;

        return view('pages.warehouse.storage.storage-edit', compact('dbWarehouseStorage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseStorageUpdateRequest $request, WarehouseStorage $warehouseStorage)
    {
        //
        $request['filter'] = strtolower($request['title']);
        $warehouseStorage->update($request->all());

        return redirect()->route('warehouse_storages.show', $warehouseStorage->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function is_active(Request $request, WarehouseStorage $warehouseStorage)
    {
        //
        $warehouseStorage->update($request->only('is_active'));

        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function permission(WarehouseStorage $warehouseStorage, User $user)
    {
        //
        WarehousePermission::create([
            'warehouse_id' => $warehouseStorage->id,
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Permissão atribuida com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function revoke(WarehouseStorage $warehouseStorage, User $user)
    {
        // Encontra a permissão correspondente
        $dbWarehousePermission = WarehousePermission::where('user_id', $user->id)
            ->where('warehouse_id', $warehouseStorage->id)
            ->first();

        // Verifica se a permissão existe antes de tentar deletá-la
        if ($dbWarehousePermission) {
            $dbWarehousePermission->delete();
            return redirect()->back()->with('success', 'Permissão revogada com sucesso!');
        }

        // Retorna erro se a permissão não foi encontrada
        return redirect()->back()->with('error', 'Permissão não encontrada!');
    }
}
