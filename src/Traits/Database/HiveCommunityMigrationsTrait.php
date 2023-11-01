<?php

namespace Sixincode\HiveCommunity\Traits\Database;

use Sixincode\HiveCommunity\Database\Migrations as Migrations;

trait HiveCommunityMigrationsTrait
{
  public function migrateUp(): void
  {
    $this->migrateHiveCommunityOneUp();
    // $this->migrateHiveCommunityTwoUp();
    // $this->migrateHiveCommunityThreeUp();
  }

  public function migrateUpAll(): void
  {
    \HiveAlpha::migrateUp();
    // \HiveStream::migrateUp();
    // \HivePosts::migrateUp();
    // \HiveCalendar::migrateUp();
    $this->migrateUp();
  }

  public function migrateDown(): void
  {
    $this->migrateHiveCommunityOneDown();
    // $this->migrateHiveCommunityTwoDown();
    // $this->migrateHiveCommunityThreeDown();
  }

  public function migrateDownAll(): void
  {
    // \HiveCalendar::migrateDown();
    // \HivePosts::migrateDown();
    // \HiveStream::migrateDown();
    \HiveAlpha::migrateDown();
    $this->migrateDown();
  }

  public function migrateHiveCommunityOneUp(): void
  {
    $migration = new Migrations\HiveCommunityOneTables;
    $migration->up();
  }

  public function migrateHiveCommunityOneDown(): void
  {
    $migration = new Migrations\HiveCommunityOneTables;
    $migration->down();
  }
}
