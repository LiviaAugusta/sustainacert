<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SciMeasurement extends Model
{
    use HasFactory;

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

    /**
     * Relation: The company associated with this SCI measurement.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Scope: filter by location.
     */
    public function scopeOfLocation($query, string $location)
    {
        return $query->where('location', $location);
    }

    /**
     * Scope: filter by period.
     */
    public function scopeOfPeriod($query, string $period)
    {
        return $query->where('periodo', $period);
    }
}