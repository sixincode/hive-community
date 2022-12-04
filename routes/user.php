<?php
use Illuminate\Support\Facades\Route;
use Sixincode\HiveCommunity\Http\Controllers\User as Controllers;
use Sixincode\HiveCommunity\Http\Livewire as Livewires;

Route::middleware(
  config('hive-stream.routes.user.middlewares.default', ['web','auth:web']),
)->prefix(
  config('hive-stream.routes.user.prefix', 'home')
)->name('user.')->group(function () {

    Route::middleware(
      config('hive-community.routes.user.middlewares.has_team', ['has_team']),
      config('hive-community.routes.user.middlewares.allow_teams', ['allow_teams']),
    )->prefix(
      config('hive-community.routes.user.teams.prefix', 'teams')
    )->group(function () {

      if(config('hive-community.routes.user.teams.index', false))
        {
          Route::get('/',  [Controllers\Teams\TeamsController::class, 'indexUserTeam'])
               ->name('teams.index');
        }

      if(config('hive-community.routes.user.teams.show', false))
        {
          Route::get('/{team}',  [Controllers\Teams\TeamsController::class, 'showUserTeam'])
                ->name('teams.show');
        }
    });


});
