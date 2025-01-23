<?php

namespace App\Models\Configuration\Warehouse;

use App\Models\Configuration\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseList extends Model
{
    /** @use HasFactory<\Database\Factories\Configuration\Warehouse\WarehouseListFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'filter',
        'type_id',
        'is_active',
        'establishment_id',
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class, 'establishment_id', 'id');
    }

    public function WarehouseType(){
        return $this->belongsTo(WarehouseType::class, 'type_id', 'id');
    }
}
