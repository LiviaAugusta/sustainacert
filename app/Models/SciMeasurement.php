<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SciMeasurement extends Model
{
    protected $fillable = [
        'company_id',
        'software_nome',
        'energia_kwh',
        'carbon_intensity',
        'network_data_mb',
        'hardware_type',
        'location',
        'periodo',
    ];
}
