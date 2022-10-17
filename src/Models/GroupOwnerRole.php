<?php

namespace Sixincode\HiveCommunity\Models;

class GroupOwnerRole extends GroupRole
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
