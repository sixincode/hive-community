<?php

namespace Sixincode\HiveCommunity\Http\Controllers\Central;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function mainAbout()
    {
      return view('hive-community::central.about.mainAbout');
    }
}
