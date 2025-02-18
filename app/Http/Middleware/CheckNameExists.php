<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Traits\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNameExists
{

    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dd($request->all());
        if (!$request->has('name')) {
            return $this->errorResponse('Name is required', Response::HTTP_BAD_REQUEST);
        }

        $name = $request->input('name');

        if (!User::where('name', $name)->exists()) {
            return $this->errorResponse('Name not found', Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
