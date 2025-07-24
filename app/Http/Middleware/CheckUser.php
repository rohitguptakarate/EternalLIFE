<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $checkAdmin = 'Admin';
        $getAdmin = User::first();
    
        $user = session('loggedInUser');
        if (!$user) {
            return redirect('/login')->with('error', 'Please login first!');
        }
        if ($user && $user->name ==  $checkAdmin) {
            return $next($request);
        } else {
            return redirect('/login')->with('error', 'You are not admin!');
        }
        return $next($request);


        //  this for try to test 
        // echo $user->role ;
        // $name = $user->email;
        // return die($request->id);
        // return die($user);
    }
}