<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;

class EditTeam extends Component
{
  public $teams;

  public function mount()
  {
    $this->teams = auth()->user()->allTeams();
    // $this->teams = auth()->user()->teams()->get();
  }

  public function render()
  {
    return view('hive-community::livewire.user.teams.editUserTeam');
  }
}
