<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;
use Sixincode\HiveCommunity\Models\Team;

class ShowTeam extends Component
{
  public $team;
  public $users;

  public function mount(Team $team)
  {
    $this->team  = $team;
    $this->users = $team->users;
  }

  public function render()
  {
    return view('hive-community::livewire.user.teams.showUserTeam');
  }
}
