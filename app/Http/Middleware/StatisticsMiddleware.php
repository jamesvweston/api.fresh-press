<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;

class StatisticsMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        //  dd(Debugbar::getData()['queries']);
        if (Debugbar::isEnabled())
        {
            $response->header('DB_Total_Statements', Debugbar::getData()['queries']['nb_statements']);

        }

        return $response;
    }

}
