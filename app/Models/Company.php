<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'nome',
        'p_iva',
        'settore',
        'dimensione',
        'paese',
    ];
}
