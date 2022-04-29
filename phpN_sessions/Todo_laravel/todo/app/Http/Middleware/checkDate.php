<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class checkDate
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
        $end_date = DB::table('todo')->select('end_date')->where('id' , $request->id )->get();

        $end = strtotime($end_date);

        if($end < time()){
            return redirect('/ToDo');

            // dd(
            //     $request->id .'::::'.
            //    $end_date->values() . '  ::  ::'. time()
            // );
        }else{
            return $next($request);
        }

    }
}
