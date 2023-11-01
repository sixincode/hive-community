<?php

namespace Sixincode\HiveCommunity\Http\Controllers\User\Communities;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class CommunitiesUserController extends Controller
{
  public function indexUserCommunities()
  {
    return view('hive-community::user.communities.indexUserCommunity');
  }

  public function showUserCommunities($community)
  {
    return view('hive-community::user.communities.showUserCommunity',[
      'community' => $community
    ]);
  }

  public function createUserCommunities()
  {
    return view('hive-community::user.communities.createUserCommunity');
  }
}
