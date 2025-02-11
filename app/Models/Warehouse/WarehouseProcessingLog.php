<?php

namespace App\Models\Warehouse;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class WarehouseProcessingLog extends Model
{
    //
    protected $fillable = [
        'description',
        'processing_id',
        'user_id',
    ];

    public function WarehouseProcessing(){
        return $this->belongsTo(WarehouseProcessing::class, 'processing_id', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
