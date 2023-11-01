<?php

namespace Sixincode\HiveCommunity\Traits\Database;

use Sixincode\HiveCommunity\Database\Seeders as Seeders;

trait HiveCommunitySeedersTrait
{
  public function seedAll(): void
  {
    \HiveAlpha::seed();
    $thid->seed();
    // $thid->seedTwo();
    // $thid->seedthree();
  }

  public function seed(): void
  {
    $seeder = new Seeders\HiveCommunityOneDatabaseSeeder;
    $seeder->run();
  }

}
