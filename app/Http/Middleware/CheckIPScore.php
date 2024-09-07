<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckIPScore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        $score = $this->getIPScore(\request()->ip());
//        if($score < 40)
//            return $next($request);
//
//        return redirect(route('user.proxy'));

        return $next($request);

    }

    private function getIPScore($ip)
    {
        $api = 'yn3uddFNipWp8n4So7BZWmUl7NxnREgg';
        $response = Http::post("https://ipqualityscore.com/api/json/ip/$api/$ip?strictness=2&fast=1");

       // dd($response->json());

        return $response->json()['fraud_score'] ?? 0;
    }
}
