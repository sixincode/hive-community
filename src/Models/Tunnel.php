<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveAlpha\Models\HiveModel;
use Illuminate\Database\Eloquent\Model;
use Sixincode\HiveHelpers\Traits as HelperTraits;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tunnel extends HiveModel
{
  use HelperTraits\HasTypeTrait;
  use HelperTraits\IsFeaturedTrait;
  use HelperTraits\SortOrderTrait;

  public function getTable()
  {
    return config('hive-community.table_names.tunnels');
  }

  public function chanel(): BelongsTo
  {
      return $this->belongsTo(Chanel::class,'chanel_id');
  }

}
