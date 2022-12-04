<?php

namespace Sixincode\HiveCommunity\Http\Controllers\User\Teams;

use Illuminate\Routing\Controller;

class TeamsController extends Controller
{
  public function indexUserTeam()
  {
    return view('hive-community::user.teams.indexUserTeam');
  }

  public function showUserTeam()
  {
    return view('hive-community::user.teams.showUserTeam');
  }
}
