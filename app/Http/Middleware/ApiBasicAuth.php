<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = env('API_BASIC_USER');
        $password = env('API_BASIC_PASSWORD');

        if (
            $request->getUser() !== $user ||
            $request->getPassword() !== $password
        ) {
            return response()->json(
                ['message' => 'Unauthorized'],
                401,
                ['WWW-Authenticate' => 'Basic']
            );
        }

        return $next($request);
    }
}
