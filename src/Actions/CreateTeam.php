<?php

namespace Sixincode\HiveCommunity\Actions;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Jetstream\Jetstream;

class CreateTeam implements CreatesTeams
{
  public function create(User $user, array $input): Team
  {
      Gate::forUser($user)->authorize('create', Jetstream::newTeamModel());

      Validator::make($input, [
        'name'        => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
      ])->validateWithBag('createTeam');

      AddingTeam::dispatch($user);

      $user->switchTeam($team = $user->ownedTeams()->create([
          'name'          => $input['name'],
          'description'   => $input['description'],
          'owner_type'    => User::class,
          'owner_id'      => $user->getIdKey(),
          'code'          => check_getDefaultTeamCode(),
          'reference'     => check_getDefaultTeamReference(),
          'personal_team' => false, 
      ]));

      return $team;
  }
}
