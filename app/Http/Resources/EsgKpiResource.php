<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EsgKpiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->id,
            'company_id'          => $this->company_id,
            'kpi_nome'            => $this->kpi_nome,
            'valore'              => $this->valore,
            'unita_misura'        => $this->unita_misura,
            'categoria'           => $this->categoria,
            'riferimento_normativo' => $this->riferimento_normativo,
            'periodo'             => $this->periodo,
            'created_at'          => $this->created_at?->toDateTimeString(),
        ];
    }
}