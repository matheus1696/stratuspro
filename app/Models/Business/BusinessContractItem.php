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
        'unit_id',
        'unit_price',
        'contract_id',
    ];

    public function ConfigurationUnit()
    {
        return $this->belongsTo(ConfigurationMeasurementUnit::class, 'unit_id');
    }
}
