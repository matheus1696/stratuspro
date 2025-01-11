<?php

namespace App\Models\Business;

use App\Models\Configuration\ConfigurationFinancialBlock;
use Database\Seeders\ConfigurationFinancialBlockSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessContract extends Model
{
    /** @use HasFactory<\Database\Factories\Business\BusinessContractFactory> */
    use HasFactory;

    protected $fillable = [
        'number_process_bidding',
        'number_auction',
        'number_price_registration',
        'number_price_record_document',
        'title',
        'filter',
        'description',
        'start_date',
        'end_date',
        'period',
        'status_id',
        'total_price',
        'request_price',
        'balance_price',
    ];

    public function ContractStatus()
    {
        return $this->belongsTo(BusinessContractStatus::class, 'status_id');
    }

    // Relacionamento muitos para muitos com FinancialBlock
    public function FinancialBlock()
    {
        return $this->belongsToMany(ConfigurationFinancialBlock::class, 'business_contract_has_financial_block');
    }
}
