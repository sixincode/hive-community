<?php

use Sixincode\HiveCommunity\Components as HiveCommunityComponents;
use Sixincode\HiveCommunity\Http\Livewire as HiveCommunityLivewire;

// config for Sixincode/HiveCommunity Components
return [
    'blade' => [
      'create-community-add-taxonomy'  => HiveCommunityComponents\Teams\CreateCommunityAddTaxonomy::class,

    ],
    'livewire' => [
      'central-teams-index'  => HiveCommunityLivewire\Central\Teams\IndexCentralCommunity::class,

      'user-teams-index'     => HiveCommunityLivewire\User\Teams\IndexTeam::class,
      'user-teams-create'    => HiveCommunityLivewire\User\Teams\CreateTeam::class,
      'user-teams-show'      => HiveCommunityLivewire\User\Teams\ShowTeam::class,
      'user-teams-edit'      => HiveCommunityLivewire\User\Teams\EditTeam::class,

      'user-communities-index'     => HiveCommunityLivewire\User\Communities\IndexCommunity::class,
      'user-communities-create'    => HiveCommunityLivewire\User\Communities\CreateCommunity::class,
      'user-communities-show'      => HiveCommunityLivewire\User\Communities\ShowCommunity::class,
      'user-communities-edit'      => HiveCommunityLivewire\User\Communities\EditCommunity::class,

      'user-teams-invite-member'    => HiveCommunityLivewire\User\Teams\InviteMember::class,
    ],
    'prefix' => 'hive-community',
];
