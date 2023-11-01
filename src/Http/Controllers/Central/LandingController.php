<?php

namespace Sixincode\HiveCommunity\Http\Controllers\Central;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function mainLanding()
    {
      return view('hive-community::central.landing.mainLanding');
    }
}
