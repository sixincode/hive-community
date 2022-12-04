<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;
use Sixincode\HiveCommunity\Models\Team;

class ShowTeam extends Component
{
  public $team;

  public function mount(Team $team)
  {

  }

  public function render()
  {
    return view('hive-community::livewire.user.teams.showUserTeam');
  }
}
