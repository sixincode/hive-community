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
use Illuminate\Support\Facades\Blade;
use Sixincode\HiveCommunity\Traits\HiveCommunityDatabase;
use Illuminate\Database\Schema\Blueprint;

class HiveCommunityServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
      $package
            ->name('hive-community')
            ->hasConfigFile(['hive-community','hive-community-components'])
            ->hasViews()
            ->hasRoutes(['web','user','api'])
            ->hasMigration('create_hive-community_table')
            ->hasCommand(HiveCommunityCommand::class);

      $this->registerHiveCommunityDatabaseMethods();
      $this->registerJetstreamModels();
    }

    public function bootingPackage()
    {
      $this->bootHiveCommunityMiddlewares();
    }

    public function packageBooted()
    {
      $this->bootHiveCommunityBladeAndLivewireComponents();
    }

    private function registerHiveCommunityDatabaseMethods(): void
    {
      Blueprint::macro('addTeamFields', function () {
        HiveCommunityDatabase::addTeamFields();
      });

      Blueprint::macro('addCanalFields', function () {
        HiveCommunityDatabase::addCanalFields();
      });

      Blueprint::macro('addChanelFields', function () {
        HiveCommunityDatabase::addChanelFields();
      });

      Blueprint::macro('addTeamUserFields', function () {
        HiveCommunityDatabase::addTeamUserFields();
      });
    }


    public function bootHiveCommunityBladeAndLivewireComponents()
    {
       $prefix = config('hive-community-components.prefix', 'hive-calendar');
       foreach (config('hive-community-components.livewire', []) as $alias => $component)
       {
          $alias = $prefix ? "$prefix-$alias" : $alias;
          Livewire::component($alias, $component);
       }

       foreach (config('hive-community-components.blade', []) as $alias => $component)
       {
          $alias = $prefix ? "$prefix-$alias" : $alias;
          Blade::component($alias, $component);
       }
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
      Jetstream::useMembershipModel('Sixincode\H
      iveCommunity\Models\TeamMembership');
    }
}
