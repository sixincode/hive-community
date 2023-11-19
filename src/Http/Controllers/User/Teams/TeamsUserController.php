<?php

namespace Sixincode\HiveCommunity\Http\Controllers\User\Teams;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Jetstream\Jetstream;
use Sixincode\HiveCommunity\Models\Team;

class TeamsUserController extends Controller
{
  public function indexUserTeam()
  {
    return view('hive-community::user.teams.indexUserTeam');
  }

  public function showUserTeam(Request $request, Team $team)
  {
    $team = Jetstream::newTeamModel()->findOrFail($team->id);

    // if (Gate::denies('view', $team)) {
    //     abort(403);
    // }
    return view('hive-community::user.teams.showUserTeam',[
      'user' => $request->user(),
      'team' => $team
    ]);
  }

  public function createUserTeam(Request $request)
  {
    Gate::authorize('create', Jetstream::newTeamModel());

    return view('hive-community::user.teams.createUserTeam', [
            'user' => $request->user(),
        ]);
  }
}
