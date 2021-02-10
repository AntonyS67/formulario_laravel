<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class CheckAge
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
        $now = Carbon::now();
        $edad = $now->diffInYears(Carbon::parse($request->birthday),$now->toDateTimeString());
        if($edad < 18){
            return response()->json(['success'=>false,'msg'=>'Usted es menor de edad']);
        }
        return $next($request);
    }
}
