<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;
use Sixincode\HiveCommunity\Models\Team;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Actions\UpdateTeamMemberRole;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Contracts\InvitesTeamMembers;
use Laravel\Jetstream\Contracts\RemovesTeamMembers;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Role;

class TeamMemberManage extends Component
{
    public Team $team;

    public $currentlyManagingRole = false;

    public $managingRoleFor;

    public $currentRole;

    public $confirmingLeavingTeam = false;

    public $confirmingTeamMemberRemoval = false;

    public $teamMemberIdBeingRemoved = null;

    public $addTeamMemberForm = [
        'email' => '',
        'role' => null,
    ];

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function addTeamMember()
    {
        $this->resetErrorBag();

        if (Features::sendsTeamInvitations()) {
            app(InvitesTeamMembers::class)->invite(
                $this->user,
                $this->team,
                $this->addTeamMemberForm['email'],
                $this->addTeamMemberForm['role']
            );
        } else {
            app(AddsTeamMembers::class)->add(
                $this->user,
                $this->team,
                $this->addTeamMemberForm['email'],
                $this->addTeamMemberForm['role'],
            );
        }

        $this->addTeamMemberForm = [
            'email' => '',
            'role'  => null,
        ];

        $this->team = $this->team->fresh();

        $this->dispatch('saved');
    }


    public function cancelTeamInvitation($invitationId)
    {
        if (! empty($invitationId)) {
            $model = Jetstream::teamInvitationModel();

            $model::whereKey($invitationId)->delete();
        }

        $this->team = $this->team->fresh();
    }

    public function manageRole($userId)
    {
        $this->currentlyManagingRole = true;
        $this->managingRoleFor = Jetstream::findUserByIdOrFail($userId);
        $this->currentRole = $this->managingRoleFor->teamRole($this->team)->key;
    }

    public function updateRole(UpdateTeamMemberRole $updater)
    {
        $updater->update(
            $this->user,
            $this->team,
            $this->managingRoleFor->id,
            $this->currentRole
        );

        $this->team = $this->team->fresh();

        $this->stopManagingRole();
    }

    public function stopManagingRole()
    {
        $this->currentlyManagingRole = false;
    }

    public function leaveTeam(RemovesTeamMembers $remover)
    {
        $remover->remove(
            $this->user,
            $this->team,
            $this->user
        );

        $this->confirmingLeavingTeam = false;

        $this->team = $this->team->fresh();

        return redirect(config('fortify.home'));
    }

    public function confirmTeamMemberRemoval($userId)
    {
        $this->confirmingTeamMemberRemoval = true;

        $this->teamMemberIdBeingRemoved = $userId;
    }

    public function removeTeamMember(RemovesTeamMembers $remover)
    {
        $remover->remove(
            $this->user,
            $this->team,
            $user = Jetstream::findUserByIdOrFail($this->teamMemberIdBeingRemoved)
        );

        $this->confirmingTeamMemberRemoval = false;

        $this->teamMemberIdBeingRemoved = null;

        $this->team = $this->team->fresh();
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function getRolesProperty()
    {
        return collect(Jetstream::$roles)->transform(function ($role) {
            return with($role->jsonSerialize(), function ($data) {
                return (new Role(
                    $data['key'],
                    $data['name'],
                    $data['permissions']
                ))->description($data['description']);
            });
        })->values()->all();
    }

    public function render()
    {
      return view('hive-community::livewire.user.teams.manageTeamMembers');
    }
}
