<?php

namespace App\Models\Warehouse;

use App\Models\Configuration\Company\CompanyEstablishment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseDistributionCenter extends Model
{
    /** @use HasFactory<\Database\Factories\Warehouse\WarehouseDistributionCenterFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'establishment_id',
    ];

    public function CompanyEstablishment(){
        return $this->belongsTo(CompanyEstablishment::class, 'establishment_id');
    }
}
