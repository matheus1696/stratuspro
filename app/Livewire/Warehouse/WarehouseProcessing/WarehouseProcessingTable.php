<?php

namespace App\Livewire\Warehouse\WarehouseProcessing;

use App\Models\Configuration\Company\CompanyEstablishment;
use App\Models\Warehouse\WarehouseInventory;
use App\Models\Warehouse\WarehouseProcessing;
use App\Models\Warehouse\WarehouseProcessingCategory;
use Livewire\Component;

class WarehouseProcessingTable extends Component
{
    public $date;
    public $ticket;
    public $establishment = "";
    public $processing = "";
    public $warehouseStorageId;

    public function render()
    {
        $query = WarehouseProcessing::query();
        $query->where('warehouse_id', $this->warehouseStorageId);

        // Filtro por ticket
        if (!empty($this->ticket)) { $query->where('ticket', 'like', '%' . $this->ticket . '%'); }

        // Filtro por data
        if (!empty($this->date)) { $query->whereDate('created_at', $this->date); }

        // Filtro por estabelecimento
        if (!empty($this->establishment)) { $query->where('establishment_id', $this->establishment ); }

        // Filtro por ação
        if (!empty($this->processing)) { $query->where('processing_category_id', $this->processing); }

        //
        $dbWarehouseProcessings = $query->orderBy('ticket')->get();

        $dbWarehouseInventories = WarehouseInventory::where('warehouse_id', $this->warehouseStorageId)->get();
        $dbEstablishments = CompanyEstablishment::orderBy('title')->get();
        $dbWarehouseProcessingCategories = WarehouseProcessingCategory::all();

        return view('livewire.warehouse.warehouse-processing.warehouse-processing-table', compact('dbWarehouseProcessings','dbWarehouseInventories','dbEstablishments','dbWarehouseProcessingCategories'));
    }
}
