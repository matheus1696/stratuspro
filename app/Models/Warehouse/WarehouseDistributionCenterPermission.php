<?php

namespace App\Models\Warehouse;

use Illuminate\Database\Eloquent\Model;

class WarehouseDistributionCenterPermission extends Model
{
    //
    protected $fillable = [
        'user_id',
        'distribution_center_id',
    ];

    public function DistributionCenter(){
        return $this->belongsTo(WarehouseDistributionCenter::class, 'distribution_center_id');
    }
}
