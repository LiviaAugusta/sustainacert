<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EsgKpiController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\SciMeasurementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Queste rotte sono caricate dal RouteServiceProvider e hanno già il
| prefisso /api e il middleware 'api' (stateless, più leggero).
*/

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::apiResource('companies', CompanyController::class);
//     Route::apiResource('esg-kpis', EsgKpiController::class);
//     Route::apiResource('sci_measurements', SciMeasurementController::class);
// });
Route::apiResource('esg-kpis', EsgKpiController::class)->only('index');