<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveAlpha\Models\HiveModel;
use Laravel\Jetstream\Membership as JetstreamMembership;

class TeamMembership extends JetstreamMembership
{
  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = true;

  public function getTable()
  {
    return config('hive-community.table_names.team_user');
  }
}
