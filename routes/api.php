<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API v1 Routes — E-Commerce Platform
|--------------------------------------------------------------------------
| All routes are prefixed with /api (and /v1 in the group below).
| Add auth middleware and controllers in Phase 3+.
*/

Route::prefix('v1')->group(function (): void {
    Route::get('/', function (): JsonResponse {
        return response()->json([
            'message' => 'Laravel E-Commerce API',
            'version' => '1.0',
            'docs' => '/api/v1/up',
        ]);
    });

    Route::get('/up', function (): JsonResponse {
        return response()->json(['status' => 'ok']);
    });
});
