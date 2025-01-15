<?php

namespace App\Models\Business;

use App\Models\Region\RegionCity;
use App\Models\Region\RegionState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessContractSupplier extends Model
{
    /** @use HasFactory<\Database\Factories\Business\BusinessContractSupplierFactory> */
    use HasFactory;

    protected $fillable = [
        'supplier',
        'cnpj',
        'nire',
        'responsible_name',
        'responsible_cpf',
        'responsible_state_id',
        'responsible_city_id',
        'email',
        'email_opcional',
        'phone_1',
        'phone_2',
        'address_street',
        'address_number',
        'address_neighborhood',
        'state_id',
        'city_id',
        'is_active',
        'notes',
    ];

    public function RegionState(){
        return $this->belongsTo(RegionState::class, 'state_id');
    }

    public function RegionCity(){
        return $this->belongsTo(RegionCity::class, 'city_id');
    }
}
