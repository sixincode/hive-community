<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;

class CreateTeam extends Component
{
  public $team;

  public function mount()
  {
    // $this->teams = auth()->user()->teams()->get();
  }

  public function render()
  {
    return view('hive-community::livewire.user.teams.createUserTeam');
  }
}
