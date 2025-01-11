<?php

namespace App\Models\Configuration;

use App\Models\Business\BusinessContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigurationFinancialBlock extends Model
{
    /** @use HasFactory<\Database\Factories\Configuration\ConfigurationFinancialBlockFactory> */
    use HasFactory;

    // Relacionamento muitos para muitos com BusinessContract
    public function BusinessContract()
    {
        return $this->belongsToMany(BusinessContract::class, 'business_contract_has_financial_block');
    }
}
