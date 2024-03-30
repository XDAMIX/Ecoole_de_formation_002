<?php

namespace App\Http\Middleware;

use Closure;

class IncreaseExecutionTime
{
    public function handle($request, Closure $next)
    {
        ini_set('max_execution_time', 600);
        return $next($request);
    }
}