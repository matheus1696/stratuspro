<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProductCategory extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseProductCategoryFactory> */
    use HasFactory;
    
    protected $fillable = [
        'title',
        'filter',
        'is_active'
    ];
}
