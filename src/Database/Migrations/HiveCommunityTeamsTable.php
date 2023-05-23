<?php
namespace Sixincode\HiveCommunity\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Sixincode\HiveAlpha\Traits\HiveAlphaDatabase;

class HiveCommunityTeamsTable
{
  public static function up()
  {
      Schema::table('teams', function (Blueprint $table) {
        $table->slugField();
        $table->descriptionFieldJson('description')->after('slug');
        $table->descriptionFieldJson('users')->after('description');
        $table->string('type')->after('users')->nullable();
        $table->isFeaturedField();
        $table->isDefaultField();
        $table->isPrivateField();
        $table->isActiveField();
        $table->sortOrderField();
        $table->globalUserField();
        $table->propertiesSchemaField();
        $table->dataSchemaField();
        $table->globalField();
        $table->morphToOwner();
        $table->softDeletes();
      });

      Schema::table('team_user', function (Blueprint $table) {
        $table->isFeaturedField();
        $table->isDefaultField();
        $table->isPrivateField();
      });
  }

  public static function down()
  {
    Schema::table('teams', function (Blueprint $table) {
        $table->dropColumn('slug');
        $table->dropColumn('description');
        $table->dropColumn('users');
        $table->dropColumn('type');
        $table->dropColumn('is_featured');
        $table->dropColumn('is_default');
        $table->dropColumn('is_private');
        $table->dropColumn('is_active');
        $table->dropColumn('sort_order');
        $table->dropColumn('user_global');
        $table->dropColumn('properties');
        $table->dropColumn('data');
        $table->dropColumn('global');
        $table->dropColumn('owner_type');
        $table->dropColumn('owner_id');
        $table->dropColumn('is_deleted');
      });

      Schema::table('team_user', function (Blueprint $table) {
        $table->dropColumn('is_featured');
        $table->dropColumn('is_default');
        $table->dropColumn('is_private');
      });
   }
 }
