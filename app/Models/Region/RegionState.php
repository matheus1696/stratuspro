<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionState extends Model
{
    /** @use HasFactory<\Database\Factories\\Region\RegionStateFactory> */
    use HasFactory;

    protected $fillable = [
        'is_active',
    ];

    public function RegionCountry()
    {
        return $this->belongsTo(RegionCountry::class, 'country_id');
    }
}
