<?php

namespace Sixincode\HiveCommunity\Models;

use Sixincode\HiveAlpha\Models\HiveModel;

class Community extends Team
{

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
          $query->where(
             config('hive-community.column_names.reference')
             config('hive-community.reference_values.community')
           );
        });
    }

}
