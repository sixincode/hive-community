<?php

namespace Sixincode\HiveCommunity;

use Sixincode\ModulesInit\Package;
use Sixincode\ModulesInit\PackageServiceProvider;
use Sixincode\HiveCommunity\Commands\HiveCommunityCommand;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Sixincode\HiveCommunity\Traits\Database as DatabaseTraits;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Routing\Router;
use Illuminate\Foundation\AliasLoader;

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
            ->hasConfigFile(['hive-community','hive-community-components','hive-community-features','hive-community-layouts','hive-community-middlewares','hive-community-views'])
            ->hasViews()
            ->hasAssets()
            ->hasTranslations()
            ->hasBladeComponents()
            // ->hasLayouts()
            // ->hasIcons()
            ->hasRoutes(['web','api','admin','user','user-teams'])
            ->hasMigration('create_hive-community_table')
            // ->runsMigrations()
            ->hasCommand(HiveCommunityCommand::class);

            $this->registerHiveCommunityDatabaseMethods();
    }

    public function registeringPackage()
    {
      $loader = AliasLoader::getInstance();
      // $loader->alias('App\Models\Team', 'Sixincode\HiveCommunity\Models\Team');
      $loader->alias('App\Actions\Jetstream\CreateTeam', 'Sixincode\HiveCommunity\Actions\CreateTeam');
      $loader->alias('App\Actions\Jetstream\UpdateTeamName', 'Sixincode\HiveCommunity\Actions\UpdateTeamName');
    }

    public function bootingPackage()
    {
      $this->bootHiveCommunityMiddlewares();
    }

    private function registerHiveCommunityDatabaseMethods(): void
    {
      Blueprint::macro('addTeamFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::addTeamFields($table, $properties);
      });

      Blueprint::macro('joinTeamFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::joinTeamFields($table, $properties);
      });

      Blueprint::macro('addChanelFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::addChanelFields($table, $properties);
      });

      Blueprint::macro('addTunnelFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::addTunnelFields($table, $properties);
      });

      Blueprint::macro('addTeamUserFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::addTeamUserFields($table, $properties);
      });

      Blueprint::macro('joinTeamUserFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::joinTeamUserFields($table, $properties);
      });

      Blueprint::macro('addTeamInvitationFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::addTeamInvitationFields($table, $properties);
      });

      Blueprint::macro('joinTeamInvitationFields', function (Blueprint $table, $properties = []) {
        DatabaseTraits\HiveCommunityDatabaseDefinitions::joinTeamInvitationFields($table, $properties);
      });
    }

    public function bootHiveCommunityMiddlewares()
    {
      $router = $this->app->make(Router::class);
      $router->aliasMiddleware('has_team', Middlewares\HiveCommunityUserHasTeam::class);
      $router->aliasMiddleware('allow_teams', Middlewares\HiveCommunityUserAllowTeams::class);
    }
}
