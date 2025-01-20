<?php

namespace App\Models\Configuration\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGender extends Model
{
    /** @use HasFactory<\Database\Factories\Configuration\User\UserGenderFactory> */
    use HasFactory;  
    
    protected $table = "configuration_user_genders";

    protected $fillable = [
        'title',
        'is_active',
    ];
}
