<?php

namespace Sixincode\HiveCommunity\Http\Controllers\Central;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function mainContact()
    {
      return view('hive-community::central.contact.mainContact');
    }
}
