<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userBan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $ban): Response
    {

        if(auth()->user()->ban == $ban){
            return $next($request);
        }else{
            // return redirect()->back()->with('message','Access Denied: Your account has been banned');
            return redirect()->route('emailcontact')->withInput()->with('error','Access Denied: Your account has been banned, Contact Administration');        }
        

    }
}
