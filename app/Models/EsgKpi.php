<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsgKpi extends Model
{
    protected $fillable = [
        'company_id',
        'kpi_nome',
        'valore',
        'unità_misura',
        'categoria',
        'riferimento_normativo',
        'periodo',
    ];
}