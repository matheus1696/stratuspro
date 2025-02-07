<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class WarehouseProcessingItem extends Model
{
    //
    protected $fillable = [
        'processing_id',
        'product_id',
        'quantity',
    ];

    public function WarehouseProduct(){
        return $this->belongsTo(WarehouseProduct::class, 'product_id', 'id');
    }
}
