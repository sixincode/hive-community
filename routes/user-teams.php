<?php

use Illuminate\Support\Facades\Route;
use Sixincode\HiveCommunity\Http\Controllers\User\Teams as Controllers;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\TeamInvitationController;

Route::middleware(
  config('hive-stream-middlewares.user', ['web','auth:web']),
)->group(function () {

  if(check_hasTeamFeatures()) {

    Route::get('/teams/create', [Controllers\TeamsUserController::class, 'createUserTeam'])
         ->name('teams.create');
    Route::get('/teams/{team}', [Controllers\TeamsUserController::class, 'showUserTeam'])
         ->name('teams.show');
    Route::put('/current-team', [CurrentTeamController::class, 'update'])
         ->name('current-team.update');

    Route::get('/team-invitations/{invitation}', [TeamInvitationController::class, 'accept'])
         ->middleware(['signed'])
         ->name('team-invitations.accept');
  }
});
