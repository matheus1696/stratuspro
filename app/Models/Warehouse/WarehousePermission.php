<?php

namespace App\Models\Warehouse;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class WarehousePermission extends Model
{
    //
    protected $fillable = [
        'user_id',
        'warehouse_id',
    ];

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
