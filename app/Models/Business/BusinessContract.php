<?php

namespace App\Models\Business;

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
        'status_id',
        'total_price',
        'request_price',
        'balance_price',
    ];

    public function ContractStatus()
    {
        return $this->belongsTo(BusinessContractStatus::class, 'status_id');
    }
}
