<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveCommunity\Trais\CollectsUsers;

class Group extends Team
{
  use CollectsUsers;

  public static function getTableAttribute()
  {
    return config('hive-community.tables_names.teams');
  }


}
