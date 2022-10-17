<?php

// config for Sixincode/HiveCommunity
return [
  'name' => 'hiveCommunity',
  'identification' => 'hive-community',
  'models'          => [
    'canals'                           => Sixincode\HiveCommunity\Models\Canal::class,
    'community'                        => Sixincode\HiveCommunity\Models\Community::class,
    'channel'                          => Sixincode\HiveCommunity\Models\Channel::class,
    'group'                            => Sixincode\HiveCommunity\Models\Group::class,
    'group_invitation'                 => Sixincode\HiveCommunity\Models\GroupInvitation::class,
    'group_membership'                 => Sixincode\HiveCommunity\Models\GroupMembership::class,
    'group_role'                       => Sixincode\HiveCommunity\Models\GroupRole::class,
    'subscription'                     => Sixincode\HiveCommunity\Models\Subscription::class,
   ],
  'table_names'     => [
    'canals'                           => 'canals',
    'communities'                      => 'communities',
    'channels'                         => 'channels',
    'groups'                           => 'groups',
    'group_membership'                 => 'membership',
    'group_invitation'                 => 'invitations',
    'group_role'                       => 'user_group',
    ],
  'column_names'    => [
      'global_key'                     => 'global',
      'owner_morph_key'                => 'owner_id',
      'owner_morph_type'
    ],

];
