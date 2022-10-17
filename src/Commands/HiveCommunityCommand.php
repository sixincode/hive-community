<?php

namespace Sixincode\HiveCommunity\Commands;

use Illuminate\Console\Command;

class HiveCommunityCommand extends Command
{
    public $signature = 'hive-community';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
