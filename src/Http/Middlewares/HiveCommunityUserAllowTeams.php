<?php

namespace Sixincode\HiveCommunity\Http\Middlewares;

use Illuminate\Routing\Controller;
use Closure;

class HiveCommunityUserAllowTeams extends Controller
{
  public function handle($request, Closure $next)
  {
    if(auth()->user())
    {
      return $next($request);
    }

    return redirect()->route('user.home');
  }
}
