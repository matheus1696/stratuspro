<?php

namespace App\Models\Warehouse;

use App\Models\Configuration\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseStorage extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseStorageFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'filter',
        'description',
        'opening_hours',
        'is_active',
        'type_id',
        'establishment_id',
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class, 'establishment_id', 'id');
    }

    public function WarehouseType(){
        return $this->belongsTo(WarehouseStorageType::class, 'type_id', 'id');
    }
}
