<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;

class Locale
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
        if (in_array($request->method(), ['GET', 'POST'])) {
            $segment = $request->segment(1);
            // Accepting API route (/api) aside the locales.
            if (!(in_array($segment, array_merge(config('app.active_languages'), array('api'))))) {
                $segments = $request->segments();
                array_shift($segments);
                $fallback = config('app.fallback_locale');
                $segments = Arr::prepend($segments, $fallback);
                return redirect()->to(implode('/', $segments));
            }
            session(['locale' => $segment]);
            app()->setLocale($segment);
        }
        return $next($request);
    }
}
