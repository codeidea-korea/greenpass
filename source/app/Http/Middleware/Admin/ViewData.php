<?php

namespace App\Http\Middleware\Admin;

use App\Models\Board;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $boards = Board::all();

        View::share('boards', $boards);

        return $next($request);
    }
}
