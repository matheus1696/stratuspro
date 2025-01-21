<?php

namespace App\Models\Configuration\Company;

use App\Models\Configuration\Region\RegionCity;
use App\Models\Configuration\Region\RegionCountry;
use App\Models\Configuration\Region\RegionState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEstablishment extends Model
{
    /** @use HasFactory<\Database\Factories\Company\CompanyEstablishmentFactory> */
    use HasFactory;

    protected $fillable =
    [
        'code',
        'title',
        'surname',
        'filter',
        'address',
        'number',
        'district',
        'city_id',
        'state_id',
        'country_id',
        'latitude',
        'longitude',
        'financial_block_id',
        'is_active',
    ];

    public function FinancialBlock(){
        return $this->belongsTo(CompanyFinancialBlock::class, 'financial_block_id');
    }

    public function RegionCity(){
        return $this->belongsTo(RegionCity::class, 'city_id');
    }    

    public function RegionState(){
        return $this->belongsTo(RegionState::class, 'state_id');
    }

    public function RegionCountry(){
        return $this->belongsTo(RegionCountry::class, 'city_id');
    }
}
