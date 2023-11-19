<?php

namespace Sixincode\HiveCommunity\Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Provider\fr_FR\Text as TextFR;
use Sixincode\HiveHelpers\Traits\FieldsTrait;
use App\Models\User;
use Sixincode\HiveCommunity\Models\Team;
use Sixincode\HivePosts\Models\Category;
use Sixincode\HivePosts\Models\Tag;
use Sixincode\HiveCommunity\Models\Model;

/**
 * @see \Sixincode\HiveCommunity\HiveCommunity
 */
class HiveCommunityOneDatabaseSeeder extends Seeder
{
  use FieldsTrait;

  public function run()
  {
   //  $faker = \Faker\Factory::create();
   //  $fakerFR = \Faker\Factory::create('fr_FR');
   //
   // $user = User::whereEmail('admin@admin.com')->first();
   // $team  = [
   //      "name"   => [
   //        "en" => "Main Admin",
   //        "fr" => "Admin Principal",
   //      ],
   //      "description"   => [
   //        "en" => "Admin User",
   //        "fr" => "Usager Admin",
   //      ],
   //      'code'          => check_getDefaultCommunityCode(),
   //      'reference'     => check_getMainCommunityReference(),
   //      'owner_type'    => User::class,
   //      'owner_id'      => $user->getIdKey(),
   //      'user_id'       => $user->getIdKey(),
   //      'personal_team' => true,
   //      'user_global'   => $user->global,
   //  ];
   //  $defaultTeam = Team::create($team);
   //  $user->ownedTeams()->save($defaultTeam);


  }
}
