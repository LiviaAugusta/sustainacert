<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EsgKpi extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'kpi_nome',
        'valore',
        'unita_misura',
        'categoria',
        'riferimento_normativo',
        'periodo',
    ];

    /**
     * Relation: The company that owns this ESG KPI.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Scope: filter by KPI category.
     */
    public function scopeOfCategory($query, string $category)
    {
        return $query->where('categoria', $category);
    }

    /**
     * Scope: filter by reporting period.
     */
    public function scopeOfPeriod($query, string $period)
    {
        return $query->where('periodo', $period);
    }
}