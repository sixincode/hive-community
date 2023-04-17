<?php

namespace Sixincode\HiveCommunity\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamMembership extends Pivot
{
  // protected $table = 'reddd';

  protected static function getTableAttribute()
  {
    return config('hive-community.table_names.team_user');
  }
}
