<?php

namespace App\Models\Configuration\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCountry extends Model
{
    /** @use HasFactory<\Database\Factories\\Region\RegionCountryFactory> */
    use HasFactory;

    protected $table = "configuration_region_countries";

    protected $fillable = [
        'is_active',
    ];
}
