<?php

namespace App\Models\Business;

use App\Models\Configuration\ConfigurationFinancialBlock;
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
        'unit_id',
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
        'contract_id',
    ];

    public function ConfigurationUnit(){
        return $this->belongsTo(ConfigurationMeasurementUnit::class, 'unit_id');
    }
}
