<?php

namespace App\Livewire\Warehouse\WarehouseMoviment;

use App\Models\Business\BusinessContractSupplier;
use App\Models\Configuration\Company\CompanyFinancialBlock;
use App\Models\Warehouse\WarehouseProduct;
use Livewire\Component;

class WarehouseMovimentForm extends Component
{
    public function render()
    {
        $dbCompanyFinancialBlocks = CompanyFinancialBlock::orderBy('title')->get();
        $dbBusinessSuppliers = BusinessContractSupplier::orderBy('supplier')->get();
        $dbWarehouseProducts = WarehouseProduct::orderBy('title')->get();

        return view('livewire.warehouse.warehouse-moviment.warehouse-moviment-form', compact('dbCompanyFinancialBlocks', 'dbBusinessSuppliers', 'dbWarehouseProducts'));
    }
}
