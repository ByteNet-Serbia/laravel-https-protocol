<?php

namespace ByteNet\LaravelHttpsProtocol\app\Http\Middleware;

use Closure;

class ByteNetHttpsProtocol
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
        if (! $request->secure() && (env('APP_ENV') === 'production' || config('bytenet.httpsProtocol.force_ssl'))) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
