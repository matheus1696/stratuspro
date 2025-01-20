<?php

namespace App\Models\Company;

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
        'latitude',
        'longitude',
        'financial_block_id',
        'is_active',
    ];
}
