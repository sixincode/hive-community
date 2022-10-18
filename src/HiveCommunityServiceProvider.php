<?php

namespace Sixincode\HiveCommunity;

use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveCommunity\Commands\HiveCommunityCommand;
use Laravel\Jetstream\Jetstream;

class HiveCommunityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/sixincode/hive-template
         */
        $package
            ->name('hive-community')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_hive-community_table')
            ->hasCommand(HiveCommunityCommand::class);

        $this->registerJetstreamModels();

    }

    public function registerJetstreamModels(): void
    {
      // Jetstream::useUserModel(config('hive-helpers.models.user'));
      // Jetstream::useTeamModel(config('hive-community.models.group'));
      // Jetstream::useMembershipModel(config('hive-community.models.group_membership'));
    }
}
