<?php

namespace App\Models\Business;

use App\Models\Configuration\ConfigurationMeasurementUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessContractItem extends Model
{
    /** @use HasFactory<\Database\Factories\Business\BusinessContractItemFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'filter',
        'description',
        'quantity_adm',
        'quantity_atb',
        'quantity_mac',
        'quantity_vepd',
        'quantity_vsan',
        'request_adm',
        'request_atb',
        'request_mac',
        'request_vepd',
        'request_vsan',
        'unit_price',
        'total_price',
        'request_price',
        'balance_price',
        'supplier_id',
        'unit_id',
        'contract_id',
    ];

    public function ConfigurationUnit(){
        return $this->belongsTo(ConfigurationMeasurementUnit::class, 'unit_id');
    }

    public function BusinessContractSupplier(){
        return $this->belongsTo(BusinessContractSupplier::class, 'supplier_id');
    }
}
