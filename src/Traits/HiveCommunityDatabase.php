<?php

namespace Sixincode\HiveCommunity\Traits;

use Sixincode\HiveHelpers\Traits\FieldsTrait;
use Laravel\Jetstream\Jetstream;
use Illuminate\Database\Schema\Blueprint;
use Sixincode\HiveCommunity\Database\Migrations\HiveCommunityTeamsTable;

trait HiveCommunityDatabase
{
  public function addTeamFields(Blueprint $table): void
  {
    $table->id();
    $table->slugField('slug');
    $table->string('name');
    $table->descriptionFieldJson('description');
    $table->descriptionFieldJson('users');
    $table->integer('user_id');
    $table->string('type')->nullable();
    $table->boolean('personal_team')->default(true);
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
    $table->timestamps();
  }

  public function addCanalFields(Blueprint $table): void
  {
    $table->id();
    $table->descriptionFieldJson('title');
    $table->descriptionFieldJson('description');
    $table->slugField('slug');
    $table->isFeaturedField();
    $table->isDefaultField();
    $table->isPrivateField();
    $table->isActiveField();
    $table->sortOrderField();
    $table->globalUserField();
    $table->propertiesSchemaField();
    $table->dataSchemaField();
    $table->globalField();
    $table->softDeletes();
    $table->timestamps();
  }

  public function addChanelFields(Blueprint $table): void
  {
    $table->descriptionFieldJson('title');
    $table->descriptionFieldJson('description');
    $table->foreignId('canal_id')->nullable();
    $table->string('type')->nullable();
    $table->isFeaturedField();
    $table->sortOrderField();
  }

  public function addTeamUserFields(Blueprint $table): void
  {
    $table->foreignId('team_id');
    $table->foreignId('user_id');
    $table->string('role')->nullable();
    $table->isFeaturedField();
    $table->isDefaultField();
    $table->isPrivateField();
    $table->timestamps();
  }

  public function migrateTeamsUp()
  {
    HiveCommunityTeamsTable::up();
  }

  public function migrateTeamsDown()
  {
    HiveCommunityTeamsTable::down();
  }

}
