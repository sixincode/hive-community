<?php

namespace Sixincode\HiveCommunity\Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * @see \Sixincode\HiveCommunity\HiveCommunity
 */
class HiveCommunityDatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call([
      HiveCommunityOneDatabaseSeeder::class,
    ]);
  }
}
