<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCity extends Model
{
    /** @use HasFactory<\Database\Factories\\Region\RegionCityFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'filter',
        'state_id',
        'is_active',
    ];
}
