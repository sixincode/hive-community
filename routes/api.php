<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveCommunity\Http\Controllers\Api\V1 as V1Controllers;

Route::middleware(
  config('hive-community-middlewares.api', ['web']),
)->name('api.central.')->prefix('api/v1')->group(function () {
   Route::post('/apiroute',  [V1Controllers\Central\CentralApiController::class, 'mainCentral'])->name('central.main');
});
