<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="admin" && $request->session()->has('name'))
        {
           $request->session()->flash('msg','Already login');
            return redirect('/usersdata');
        }
     /*   elseif(!$request->session()->has('name')) {
           $request->session()->flash('error','Please login to continue for further process');
            return redirect('admin');
        }   */
       
        return $next($request);
    }
}
