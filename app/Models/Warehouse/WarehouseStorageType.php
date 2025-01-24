<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStorageType extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseStorageTypeFactory> */
    use HasFactory;
    
    protected $fillable = [
        'title',
        'filter',
        'is_active'
    ];
}
