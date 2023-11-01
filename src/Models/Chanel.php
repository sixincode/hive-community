<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits as HelperTraits;

class Chanel extends HiveModel
{
  use HelperTraits\HasCodeTrait;
  use HelperTraits\IsActiveTrait;
  use HelperTraits\IsDefaultTrait;
  use HelperTraits\IsFeaturedTrait;
  use HelperTraits\IsPrivateTrait;
  use HelperTraits\SortOrderTrait;

  public function getTable()
  {
    return config('hive-community.table_names.chanels');
  }
}
