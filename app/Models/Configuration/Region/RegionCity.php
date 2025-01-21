<?php

namespace App\Models\Configuration\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCity extends Model
{
    /** @use HasFactory<\Database\Factories\Configuration\Region\RegionCityFactory> */
    use HasFactory;

    protected $table = "configuration_region_cities";

    protected $fillable = [
        'is_active',
    ];

    public function RegionState(){
        return $this->belongsTo(RegionState::class, 'state_id');
    }
}
