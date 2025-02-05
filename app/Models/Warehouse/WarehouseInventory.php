<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseInventory extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseInventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'quantity',
        'average_price',
        'product_id',
        'warehouse_id'
    ];

    public function WarehouseProduct(){
        return $this->belongsTo(WarehouseProduct::class, 'product_id', 'id');
    }
}
