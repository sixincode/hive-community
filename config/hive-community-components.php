<?php

use Sixincode\HiveCommunity\Http\Livewire as HiveCommunityLivewire;
use Sixincode\HiveCommunity\Components as HiveCommunityComponents;

return [
  /*
  |--------------------------------------------------------------------------
  | Blade Components
  |--------------------------------------------------------------------------
  | Below are listed all the blade components that should be loaded
  | by the packageBooted method on the package ServiceProder.
  */

  'blade' => [
    'create-community-add-taxonomy'  => HiveCommunityComponents\Teams\CreateCommunityAddTaxonomy::class,
    ],
  /*
  |--------------------------------------------------------------------------
  | Livewire Components
  |--------------------------------------------------------------------------
  | Below are listed all the Livewire components that should be loaded
  | by the bootingPackage method on the package ServiceProder.
  */
  'livewire' => [
    'central-teams-index'  => HiveCommunityLivewire\Central\Teams\IndexCentralCommunity::class,

    'user-teams-index'     => HiveCommunityLivewire\User\Teams\IndexTeam::class,
    'user-teams-create'    => HiveCommunityLivewire\User\Teams\CreateTeam::class,
    'user-teams-show'      => HiveCommunityLivewire\User\Teams\ShowTeam::class,
    'user-teams-edit'      => HiveCommunityLivewire\User\Teams\EditTeam::class,
    'user-teams-invite-member'    => HiveCommunityLivewire\User\Teams\InviteMember::class,

],

  /*
  |--------------------------------------------------------------------------
  | Components Prefix
  |--------------------------------------------------------------------------
  |
  | This value will set a prefix for all Shopper Admin components.
  | By default it's shopper. This is useful if you want to avoid
  | collision with components from other libraries.
  |
  | For example, it's reference components like:
  |
  | <x-hive-index />
  | <livewire:hive-index />
  |
  */
  'prefix' => 'hive-community',
];
