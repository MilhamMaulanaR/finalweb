<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

class Seller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        
        if (auth()->user()->role == 'Seller') {
            return $next($request);
        } elseif (auth()->user()->role == 'Buyer') {
            return $next($request);
        } elseif (auth()->user()->role == 'Admin') {
            return $next($request);
        } else {
            $errors = new MessageBag(['error' => ['You do not have any permission to access this page']]);
            return redirect()->route($request->user()->role)->withErrors($errors);
        }
    }
}
