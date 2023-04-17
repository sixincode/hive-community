<?php

namespace Sixincode\HiveCommunity\Http\Livewire\User\Teams;

use Livewire\Component;

class InviteMember extends Component
{
  public $team;
  public $currentlyManagingRole = false;
  public $managingRoleFor;
  public $currentRole;
  public $confirmingLeavingTeam = false;
  public $confirmingTeamMemberRemoval = false;
  public $teamMemberIdBeingRemoved = null;
  public $addTeamMemberForm = [
    'email' => '',
    'note' => '',
    'identification' => '',
    'role' => null,
  ];

  public function mount($team)
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
              $this->addTeamMemberForm['role']
          );
      }

      $this->addTeamMemberForm = [
          'email' => '',
          'role' => null,
      ];

      $this->team = $this->team->fresh();

      $this->emit('saved');
  }

  public function cancelTeamInvitation($invitationId)
  {
      if (! empty($invitationId)) {
          $model = Jetstream::teamInvitationModel();
          $model::whereKey($invitationId)->delete();
      }

      $this->team = $this->team->fresh();
  }

  /**
   * Allow the given user's role to be managed.
   *
   * @param  int  $userId
   * @return void
   */
  public function manageRole($userId)
  {
      $this->currentlyManagingRole = true;
      $this->managingRoleFor = Jetstream::findUserByIdOrFail($userId);
      $this->currentRole = $this->managingRoleFor->teamRole($this->team)->key;
  }

  /**
   * Save the role for the user being managed.
   *
   * @param  \Laravel\Jetstream\Actions\UpdateTeamMemberRole  $updater
   * @return void
   */
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

  /**
   * Stop managing the role of a given user.
   *
   * @return void
   */
  public function stopManagingRole()
  {
      $this->currentlyManagingRole = false;
  }

  /**
   * Remove the currently authenticated user from the team.
   *
   * @param  \Laravel\Jetstream\Contracts\RemovesTeamMembers  $remover
   * @return void
   */
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

  /**
   * Confirm that the given team member should be removed.
   *
   * @param  int  $userId
   * @return void
   */
  public function confirmTeamMemberRemoval($userId)
  {
      $this->confirmingTeamMemberRemoval = true;

      $this->teamMemberIdBeingRemoved = $userId;
  }

  /**
   * Remove a team member from the team.
   *
   * @param  \Laravel\Jetstream\Contracts\RemovesTeamMembers  $remover
   * @return void
   */
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

  /**
   * Get the current user of the application.
   *
   * @return mixed
   */
  public function getUserProperty()
  {
      return Auth::user();
  }

  /**
   * Get the available team member roles.
   *
   * @return array
   */
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
    return view('hive-community::livewire.user.teams.indexUserTeam');
  }
}
