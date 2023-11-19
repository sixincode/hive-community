<?php

// config for Sixincode/HiveCommunity
return [
  // app
  'title'                  => 'hive-community',
  'slogan'                 => 'This is hive-community.',
  'hasJetstream'           => true,
  'defaultTeamCode'        => '4000',
  'defaultCommunityCode'   => '6000',
  'mainTeamReference'      => 'publisher',
  'mainCommunityReference'      => 'aggregation',
  'defaultTeamReference'   => 'team',
  'defaultCommunityReference'   => 'community',

  // models
  'models'             => [
    'chanel'               => Sixincode\HiveCommunity\Models\Chanel::class,
    'community'            => Sixincode\HiveCommunity\Models\Community::class,
    'team_invitation'      => Sixincode\HiveCommunity\Models\TeamInvitation::class,
    'team_membership'      => Sixincode\HiveCommunity\Models\TeamMembership::class,
    'tunnel'               => Sixincode\HiveCommunity\Models\Tunnel::class,
    // 'subscription'         => Sixincode\HiveCommunity\Models\Subscription::class,
    'team'                 => Sixincode\HiveCommunity\Models\Team::class,
   ],

  // table names
  'table_names'  => [
      'teams'           => 'teams',
      'chanels'         => 'chanels',
      'tunnels'         => 'tunnels',
      'team_invitation' => 'team_invitations',
      'team_user'       => 'team_user',
  ],

  // translations
  'default_lang'      => 'en',
  'lang_route'        => 'lang',
  'translations'      => ['en','fr'],
  'locale_langs'      => [
          'en'          => ['name' => 'English', 'script' => 'Latn', 'native' => 'English', 'regional' => 'en_GB'],
          'fr'          => ['name' => 'French',  'script' => 'Latn', 'native' => 'Français', 'regional' => 'fr_FR'],
  ],
  // colors
  'main_color'        => 'red-800',
  'main_color_h'      => 'red-900',
  'second_color'      => 'yellow-300',
  'color_animation'   => '',

  // columns
  'column_names'      => [
    'reference'     => 'reference',
    'columnOne'     => 'columnOne',
  ],
  // columns
  'reference_values'      => [
    'community'       => 'community',
    'aggregation'     => 'aggregation',
  ],

];
