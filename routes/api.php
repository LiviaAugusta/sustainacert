<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EsgKpiController;

/*
|--------------------------------------------------------------------------
| API Routes
|-------------------------------------------------------------------------- 
| Queste rotte sono caricate dal RouteServiceProvider e hanno già il
| prefisso /api e il middleware 'api' (stateless, più leggero).
*/

Route::apiResource('esg-kpis', EsgKpiController::class);