<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCity extends Model
{
    /** @use HasFactory<\Database\Factories\\Region\RegionCityFactory> */
    use HasFactory;

    protected $fillable = [
        'is_active',
    ];

    public function RegionState()
    {
        return $this->belongsTo(RegionState::class, 'state_id');
    }
}
