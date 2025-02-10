<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class WarehouseProcessingCategory extends Model
{
    //
    protected $fillable = [
        'title',
        'color',
        'is_default',
        'is_active',
    ];
}
