<?php

namespace Sixincode\HiveCommunity\Http\Controllers\Admin\Controls;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ControlsAdminController extends Controller
{
    public function adminControls()
    {
      return view('hive-community::admin.controls.adminControls');
    }
}
