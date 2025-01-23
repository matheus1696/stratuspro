<?php

namespace App\Models\Configuration\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseItem extends Model
{
    /** @use HasFactory<\Database\Factories\Configuration\Warehouse\WarehouseItemFactory> */
    use HasFactory;
    
    protected $fillable = [
        'title',
        'filter',
        'description',
        'is_active'
    ];
}
