<?php

namespace Sixincode\HiveCommunity\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupMembership extends Pivot
{
  public static function getTableAttribute()
  {
    return config('hive-posts.tables_names.group_membership');
  }
}
