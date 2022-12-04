<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveCommunity\Traits\CollectsUsers;
use Sixincode\HiveCommunity\Traits\IsTeam;

class Group extends IsTeam
{
  use CollectsUsers;

}
