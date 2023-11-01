<?php

namespace Sixincode\HiveCommunity\Http\Controllers\Central;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function mainBlog()
    {
      return view('hive-community::central.blog.mainBlog');
    }
}
