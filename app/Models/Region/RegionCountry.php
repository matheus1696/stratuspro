<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionCountry extends Model
{
    /** @use HasFactory<\Database\Factories\\Region\RegionCountryFactory> */
    use HasFactory;

    protected $fillable = [ 
        'acronym', 
        'title', 
        'filter', 
        'is_active' 
    ];
}
