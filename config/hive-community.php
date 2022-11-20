<?php

// config for Sixincode/HiveCommunity
return [
  'name' => 'hiveCommunity',
  'identification'     => 'hive-community',
  'models'             => [
    'canals'                           => Sixincode\HiveCommunity\Models\Canal::class,
    'community'                        => Sixincode\HiveCommunity\Models\Community::class,
    'channel'                          => Sixincode\HiveCommunity\Models\Channel::class,
    'group'                            => Sixincode\HiveCommunity\Models\Group::class,
    'team_invitation'                  => Sixincode\HiveCommunity\Models\TeamInvitation::class,
    'team_membership'                  => Sixincode\HiveCommunity\Models\TeamMembership::class,
    'team_role'                        => Sixincode\HiveCommunity\Models\TeamRole::class,
    'subscription'                     => Sixincode\HiveCommunity\Models\Subscription::class,
    'team'                             => Sixincode\HiveCommunity\Models\Team::class,
   ],
  'table_names'         => [
    'canals'                           => 'canals',
    'communities'                      => 'communities',
    'channels'                         => 'channels',
    'teams'                            => 'teams',
    'team_membership'                  => 'memberships',
    'team_invitation'                  => 'invitations',
    'team_role'                        => 'user_team',
    'team_user'                        => 'team_user',
    ],
  'column_names'    => [
      'global_key'                     => 'global',
      'owner_morph_key'                => 'owner_id',
      'owner_morph_type'
    ],

];
