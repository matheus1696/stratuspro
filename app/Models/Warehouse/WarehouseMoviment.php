<?php

namespace App\Models\Warehouse;

use App\Models\Business\BusinessContractSupplier;
use App\Models\Configuration\Company\CompanyFinancialBlock;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseMoviment extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseMovimentFactory> */
    use HasFactory;

    protected $fillable = [        
        'invoice_number',
        'supplier_order_number',
        'supplier_id',
        'product_id',
        'quantity',
        'price',
        'total_value',
        'movement_type',
        'user_id',
        'financial_block_id',
        'warehouse_id',
    ];

    public function BusinessContractSupplier(){
        return $this->belongsTo(BusinessContractSupplier::class, 'supplier_id', 'id');
    }

    public function WarehouseProduct(){
        return $this->belongsTo(WarehouseProduct::class, 'product_id', 'id');
    }

    public function WarehouseStorage(){
        return $this->belongsTo(WarehouseStorage::class, 'warehouse_id', 'id');
    }

    public function CompanyFinancialBlock(){
        return $this->belongsTo(CompanyFinancialBlock::class, 'financial_block_id', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
