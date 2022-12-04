<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveCommunity\Traits\CollectsUsers;
use Sixincode\HiveCommunity\Traits\IsTeam;

class Team extends IsTeam
{
  use CollectsUsers;
  public $translatable = [];
  public $orderable = [];
  public $filterable = [];

  public static function slugOriginElement()
  {
    return 'name';
  }

}
