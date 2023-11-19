<?php

namespace Sixincode\HiveCommunity\Traits\Database;

use Illuminate\Database\Schema\Blueprint;
use Sixincode\HiveHelpers\Traits\FieldsTrait;

trait HiveCommunityDatabaseDefinitions
{
  public static function addTeamFields(Blueprint $table, $properties =[]): void
  {
    $table->id();
    $table->foreignId('user_id')->index();
    $table->string('name');
    $table->boolean('personal_team');
    $table->timestamps();
    $table->joinTeamFields();
  }

  public static function joinTeamFields(Blueprint $table, $properties =[]): void
  {
    // $table->dropColumn('name');
    $table->after('id', function (Blueprint $table) {
      $table->descriptionFieldJson('name')->change();
      $table->slugField();
      $table->descriptionFieldJson('description');
      $table->globalUserField();
      $table->morphToOwner();
      $table->codeField();
      $table->referenceField();
      $table->string('type')->nullable();
      $table->isFeaturedField();
      $table->isDefaultField();
      $table->isPrivateField();
      $table->isActiveField();
      $table->sortOrderField();
      $table->propertiesSchemaField();
      $table->dataSchemaField();
      $table->globalField();
      $table->softDeletes();
    });
  }

  public static function addChanelFields(Blueprint $table, $properties =[]): void
  {
    $table->addAlphaModelFields($table);
    $table->isFeaturedField();
    $table->codeField();
    $table->isDefaultField();
    $table->isPrivateField();
    $table->isActiveField();
    $table->sortOrderField();
  }

  public static function addTunnelFields(Blueprint $table, $properties =[]): void
  {
    $table->addAlphaModelFields($table);
    $table->foreignId('chanel_id')->nullable();
    $table->string('type')->nullable();
    $table->isFeaturedField();
    $table->sortOrderField();
  }

  public static function addTeamUserFields(Blueprint $table, $properties =[]): void
  {
    $table->id();
    $table->foreignId('team_id');
    $table->foreignId('user_id');
    $table->string('role')->nullable();
    $table->timestamps();
    $table->unique(['team_id', 'user_id']);
    $table->joinTeamFields();
  }

  public static function joinTeamUserFields(Blueprint $table, $properties =[]): void
  {
    $table->after('role', function (Blueprint $table) {
      $table->isFeaturedField();
      $table->isDefaultField();
      $table->isPrivateField();
    });
  }

  public static function addTeamInvitationFields(Blueprint $table, $properties =[]): void
  {
    $table->id();
    $table->foreignId('team_id')->constrained()->cascadeOnDelete();
    $table->string('email');
    $table->string('role')->nullable();
    $table->timestamps();
    $table->unique(['team_id', 'email']);

    $table->joinTeamInvitationFields();
  }

  public static function joinTeamInvitationFields(Blueprint $table, $properties =[]): void
  {
    $table->after('role', function (Blueprint $table) {
      $table->descriptionFieldJson('description');
      $table->tinyInteger('status')->default(0);
      $table->codeField();
    });
  }
}
