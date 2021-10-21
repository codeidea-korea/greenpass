<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class Board
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
        $table       = $request->route()->parameter('board', '');
        $targetTable = env('BOARD_TABLE_PREFIX').$table;

        if (!Schema::hasTable($targetTable)) {
            return back()->withErrors('해당 게시판이 존재하지 않습니다.');
        }

        $board = \App\Models\Board::where('table_name', $table)->first();

        View::share('board', $board);

        return $next($request);
    }
}
