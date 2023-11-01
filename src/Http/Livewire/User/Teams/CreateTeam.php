<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Contracts\CreatesTeams;
use Livewire\Component;
use Laravel\Jetstream\RedirectsActions;

class CreateTeam extends Component
{
    use RedirectsActions;

    public $state = [];

    public function createTeam(CreatesTeams $creator)
    {
      $this->resetErrorBag();

      $creator->create(Auth::user(), $this->state);

      return $this->redirectPath($creator);
    }

    public function mount()
    {

    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
      return view('hive-community::livewire.user.teams.createUserTeam');
    }
}
