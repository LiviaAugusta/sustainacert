<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'nome'       => $this->nome,
            'p_iva'      => $this->p_iva,
            'settore'    => $this->settore,
            'dimensione' => $this->dimensione,
            'paese'      => $this->paese,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),

            // Nested relationships (opzionali)
            'esg_kpis'   => EsgKpiResource::collection($this->whenLoaded('esgKpis')),
            'sci_data'   => SciMeasurementResource::collection($this->whenLoaded('sciMeasurements')),
        ];
    }
}