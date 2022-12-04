<?php

namespace Sixincode\HiveCommunity\Http\Middlewares;

use Illuminate\Routing\Controller;
use Closure;

class HiveCommunityUserHasTeam extends Controller
{
  public function handle($request, Closure $next)
  {
    if(auth()->user()->teams()->count() >= 0)
    {
      return $next($request);
    }

    return redirect()->route('user.home');
  }
}
