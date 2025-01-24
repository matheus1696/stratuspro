<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseProductFactory> */
    use HasFactory;
    
    protected $fillable = [
        'barcode',
        'title',
        'filter',
        'description',
        'image',
        'is_active',
        'category_id',
    ];

    public function ProductCategory(){
        return $this->belongsTo(WarehouseProductCategory::class, 'category_id', 'id');
    }
}
