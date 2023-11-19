<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;
use Sixincode\HiveCommunity\Models\Team;
use Laravel\Jetstream\Contracts\UpdatesTeamNames;
use Illuminate\Support\Facades\Auth;

class EditTeamName extends Component
{
    public Team $team;

    public $state = [];

    public function mount(Team $team)
    {
      $this->team  = $team;
      $this->state = $team->getDetailsAttributes();
    }

    public function updateTeamName(UpdatesTeamNames $updater)
    {
        $this->resetErrorBag();

        $updater->update($this->user, $this->team, $this->state);

        $this->dispatch('saved');

        $this->dispatch('refresh-navigation-menu');
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
      return view('hive-community::livewire.user.teams.editUserTeamName');
    }
}
