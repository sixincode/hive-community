<?php
use Illuminate\Support\Facades\Route;
use Sixincode\HiveCommunity\Http\Controllers\User as Controllers;
use Sixincode\HiveCommunity\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream.routes.user.middlewares.default', ['web','auth:web']),
)->prefix(
  config('hive-stream.routes.user.prefix', 'home')
)->name('user.')->group(function () {

      Route::get('/teams',  [Controllers\Teams\TeamsController::class, 'indexUserTeam'])
           ->name('teams.index');

      Route::get('/teams/create',  [Controllers\Teams\TeamsController::class, 'createUserTeam'])
           ->name('teams.create');

      Route::get('/teams/{team}',  [Controllers\Teams\TeamsController::class, 'showUserTeam'])
            ->name('teams.show');

      Route::get('/teams/{team}/edit',  [Controllers\Teams\TeamsController::class, 'editUserTeam'])
            ->name('teams.edit');
});
