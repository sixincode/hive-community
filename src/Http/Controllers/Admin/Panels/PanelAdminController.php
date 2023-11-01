<?php

namespace Sixincode\HiveCommunity\Http\Controllers\Admin\Panels;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class PanelAdminController extends Controller
{
    public function adminPanel()
    {
      return view('hive-community::admin.panels.adminPanels');
    }
}
