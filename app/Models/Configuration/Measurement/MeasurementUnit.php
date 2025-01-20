<?php

namespace App\Models\Configuration\Measurement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementUnit extends Model
{
    /** @use HasFactory<\Database\Factories\Configuration\Measurement\MeasurementUnitFactory> */
    use HasFactory;

    protected $table = "configuration_measurement_units";
}
