<?php

namespace Sixincode\HiveCommunity;

use Sixincode\HiveCommunity\Traits\Database as DatabaseTrait;

class HiveCommunity
{
  use DatabaseTrait\HiveCommunityMigrationsTrait;
  use DatabaseTrait\HiveCommunitySeedersTrait;
}
