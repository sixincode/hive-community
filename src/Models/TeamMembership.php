<?php

namespace Sixincode\HiveCommunity\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamMembership extends Pivot
{
  public static function getTableAttribute()
  {
    return config('hive-posts.tables_names.team_user');
  }
}
