<?php

namespace App\Models\Professional;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalOccupation extends Model
{
    /** @use HasFactory<\Database\Factories\\Professional\ProfessionalOccupationFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'filter',
        'description',
        'is_active',
    ];
}
