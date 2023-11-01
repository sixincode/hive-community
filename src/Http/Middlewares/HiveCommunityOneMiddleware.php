<?php

namespace Sixincode\HiveCommunity\Http\Middlewares;

use Closure;

class HiveCommunityOneMiddleware
{
  public function handle($request, Closure $next)
  {
    //
    return $next($request);
  }
}
