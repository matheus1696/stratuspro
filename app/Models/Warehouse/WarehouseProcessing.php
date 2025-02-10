<?php

namespace App\Models\Warehouse;

use App\Models\Configuration\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProcessing extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseProcessingFactory> */
    use HasFactory;

    protected $fillable = [
        'ticket',
        'establishment_id',
        'warehouse_id',
        'processing_category_id'
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class, 'establishment_id', 'id');
    }    

    public function WarehouseProcessingCategory(){
        return $this->belongsTo(WarehouseProcessingCategory::class, 'processing_category_id', 'id');
    }
}
