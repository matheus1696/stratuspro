<?php

namespace App\Models\Configuration\Warehouse;

use Illuminate\Database\Eloquent\Model;

class WarehouseType extends Model
{
    //
    protected $fillable = [
        'title',
        'filter',
        'is_active'
    ];
}
