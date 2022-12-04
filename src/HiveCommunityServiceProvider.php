<?php

namespace Sixincode\HiveCommunity;

use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveCommunity\Commands\HiveCommunityCommand;
use Laravel\Jetstream\Jetstream;
use Sixincode\HiveCommunity\Http\Livewire as HiveCommunityLivewire;
use Sixincode\HiveCommunity\Http\Middlewares as Middlewares;
use Livewire\Livewire;
use Illuminate\Routing\Router;

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
            ->hasRoutes(['web','user','api'])
            ->hasMigration('create_hive-community_table')
            ->hasCommand(HiveCommunityCommand::class);

        $this->registerJetstreamModels();
    }

    public function bootingPackage()
    {
      $this->bootHiveCommunityLivewireComponents();
      $this->bootHiveCommunityMiddlewares();
    }

    public function bootHiveCommunityLivewireComponents()
    {
      Livewire::component('hive-community-user-team-index', HiveCommunityLivewire\User\Teams\IndexTeam::class);
      Livewire::component('hive-community-user-team-show', HiveCommunityLivewire\User\Teams\ShowTeam::class);
    }

    public function bootHiveCommunityMiddlewares()
    {
      $router = $this->app->make(Router::class);
      $router->aliasMiddleware('has_team', Middlewares\HiveCommunityUserHasTeam::class);
      $router->aliasMiddleware('allow_teams', Middlewares\HiveCommunityUserAllowTeams::class);
    }

    public function registerJetstreamModels(): void
    {
      Jetstream::useUserModel('App\Models\User');
      Jetstream::useTeamModel('Sixincode\HiveCommunity\Models\Team');
      Jetstream::useMembershipModel('Sixincode\HiveCommunity\Models\TeamMembership');
    }
}
