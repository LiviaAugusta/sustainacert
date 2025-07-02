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
Route::middleware('throttle:30,1')        // 60 richieste/min IP
     ->apiResource('esg-kpis', EsgKpiController::class);