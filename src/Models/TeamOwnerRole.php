<?php

namespace Sixincode\HiveCommunity\Models;

class TeamOwnerRole extends TeamRole
{
    /**
     * Create a new role instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('owner', 'Owner', ['*']);
    }
}
