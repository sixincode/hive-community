<?php

namespace Sixincode\HiveCommunity\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sixincode\HiveCommunity\HiveCommunity
 */
class HiveCommunity extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Sixincode\HiveCommunity\HiveCommunity::class;
    }
}
