<?php

namespace Sixincode\HiveCommunity\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Sixincode\HiveAlpha\Models\HiveModel;
use Sixincode\HiveHelpers\Traits\IsActiveTrait;
use Sixincode\HiveHelpers\Traits\IsDefaultTrait;
use Sixincode\HiveHelpers\Traits\IsFeaturedTrait;
use Sixincode\HiveHelpers\Traits\IsPrivateTrait;
use Sixincode\HiveHelpers\Traits\sortOrderTrait;
use Sixincode\HiveHelpers\Traits\HasSlugTrait;
use Sixincode\HiveHelpers\Events\TeamCreated;
use Sixincode\HiveHelpers\Events\TeamDeleted;
use Sixincode\HiveHelpers\Events\TeamUpdated;

class Cannal extends HiveModel
{
    use HasOwnerTrait;
    use IsActiveTrait;
    use IsDefaultTrait;
    use IsFeaturedTrait;
    use IsPrivateTrait;
    use sortOrderTrait;
    use HasSlugTrait;


}
