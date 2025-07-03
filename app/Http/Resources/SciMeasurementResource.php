<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SciMeasurementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'company_id'      => $this->company_id,
            'software_nome'   => $this->software_nome,
            'energia_kwh'     => $this->energia_kwh,
            'carbon_intensity'=> $this->carbon_intensity,
            'network_data_mb' => $this->network_data_mb,
            'hardware_type'   => $this->hardware_type,
            'location'        => $this->location,
            'periodo'         => $this->periodo,
            'created_at'      => $this->created_at?->toDateTimeString(),
        ];
    }
}