<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nome',
        'p_iva',
        'settore',
        'dimensione',
        'paese',
    ];

    /**
     * Relation: ESG KPIs associated with the company.
     */
    public function esgKpis()
    {
        return $this->hasMany(EsgKpi::class, 'company_id');
    }

    /**
     * Relation: SCI measurements associated with the company.
     */
    public function sciMeasurements()
    {
        return $this->hasMany(SciMeasurement::class, 'company_id');
    }

    /**
     * Optional: relation to users, if you later add company_id in users table.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    /**
     * Optional: scope to filter by country.
     */
    public function scopeOfCountry($query, string $country)
    {
        return $query->where('paese', $country);
    }
}