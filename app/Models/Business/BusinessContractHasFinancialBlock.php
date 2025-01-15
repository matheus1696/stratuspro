<?php

namespace App\Models\Business;

use App\Models\Configuration\ConfigurationFinancialBlock;
use Illuminate\Database\Eloquent\Model;

class BusinessContractHasFinancialBlock extends Model
{
    //

    protected $fillable = [
        'contract_id',
        'financial_block_id',
    ];

    public function FinancialBlock(){
        return $this->belongsTo(ConfigurationFinancialBlock::class, 'financial_block_id');
    }
}
