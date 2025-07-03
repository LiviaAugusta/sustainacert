<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EsgKpi;
use Illuminate\Support\Facades\Cache;


class EsgKpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cache di 60 secondi – evita query ripetute se la dashboard fa polling
    return Cache::remember('esg_kpis_page_'.request('page',1), 60, function () {
        return EsgKpi::paginate(25);
    });
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $data = $request->validate([
                'company_id'            => 'required|exists:companies,id',
                'kpi_nome'              => 'required|string',
                'valore'                => 'required|numeric',
                'unita_misura'          => 'required|string',
                'categoria'             => 'required|in:climate,energy,waste,water,governance',
                'riferimento_normativo' => 'nullable|string',
                'periodo'               => 'required|string',
            ]);

            return EsgKpi::create($data);
        }

    /**
     * Display the specified resource.
     */
    // GET /api/esg-kpis/{id}
    public function show(EsgKpi $esgKpi)
    {
        return $esgKpi;
    }

    /**
     * Update the specified resource in storage.
     */
    // PUT/PATCH /api/esg-kpis/{id}
    public function update(Request $request, EsgKpi $esgKpi)
    {
        $data = $request->validate([
            'kpi_nome'              => 'sometimes|string',
            'valore'                => 'sometimes|numeric',
            'unita_misura'          => 'sometimes|string',
            'categoria'             => 'sometimes|in:climate,energy,waste,water,governance',
            'riferimento_normativo' => 'nullable|string',
            'periodo'               => 'sometimes|string',
        ]);

        $esgKpi->update($data);
        return $esgKpi;
    }

    /**
     * Remove the specified resource from storage.
     */
    // DELETE /api/esg-kpis/{id}
    public function destroy(EsgKpi $esgKpi)
    {
        $esgKpi->delete();
        return response()->json(['deleted' => true], 204);
    }
}
