<?php

namespace Sixincode\HiveCommunity\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sixincode\HiveCommunity\Traits\Database\HiveCommunityDatabaseDefinitions;

/**
 * @see \Sixincode\HiveCommunity\HiveCommunity
 */
class HiveCommunityOneTables
{
  public static function up()
  {
      $tableNames  = config('hive-community.table_names');
      $columnNames = config('hive-community.column_names');

      if (empty($tableNames)) {
        throw new \Exception('Error: config/hive-community.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/hive-community.php not loaded. Run [php artisan config:clear] and try again.');
      }

      if(Schema::hasTable($tableNames['teams'])) {
          $table->joinTeamFields($table);
      }else{
        Schema::create($tableNames['teams'], function (Blueprint $table) {
          $table->addTeamFields($table);
        });
      }

      if(!Schema::hasTable($tableNames['chanels'])) {
        Schema::create($tableNames['chanels'], function (Blueprint $table) {
          $table->addChanelFields($table);
        });
      }

      if(!Schema::hasTable($tableNames['tunnels'])) {
        Schema::create($tableNames['tunnels'], function (Blueprint $table) {
          $table->addTunnelFields($table);
        });
      }

      if(Schema::hasTable($tableNames['team_user'])) {
          $table->joinTeamUserFields($table);
      }else{
        Schema::create($tableNames['team_user'], function (Blueprint $table) {
          $table->addTeamUserFields($table);
        });
      }

      if(Schema::hasTable($tableNames['team_invitation'])) {
          $table->joinTeamInvitationFields($table);
      }else{
        Schema::create($tableNames['team_invitation'], function (Blueprint $table) {
          $table->addTeamInvitationFields($table);
        });
      }
  }

  public static function down()
  {
      $tableNames  = config('hive-community.table_names');
      $columnNames = config('hive-community.column_names');

      if (empty($tableNames)) {
        throw new \Exception('Error: config/hive-community.php not loaded. Run [php artisan config:clear] and try again.');
      }
      if (empty($columnNames)) {
        throw new \Exception('Error: config/hive-community.php not loaded. Run [php artisan config:clear] and try again.');
      }

      Schema::dropIfExists($tableNames['teams']);
      Schema::dropIfExists($tableNames['chanels']);
      Schema::dropIfExists($tableNames['tunnels']);
      Schema::dropIfExists($tableNames['team_user']);
  }
}
