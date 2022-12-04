<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveCommunity\Trais\CollectsUsers;
use Sixincode\HiveCommunity\Trais\IsTeam;

class Community extends IsTeam
{
  use CollectsUsers;

}
