<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveCommunity\Http\Controllers\Central as Controllers;

Route::middleware(
  config('hive-community-middlewares.central', ['web']),
)
->name('central.community')
->group(function () {

});
