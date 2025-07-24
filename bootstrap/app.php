<?php

use App\Http\Middleware\CheckUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfLoggedIn;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        //
        // for login route 
        // $middleware->append('RedirectIfLoggedIn'::class);

        $middleware->appendToGroup('RedirectIfLoggedIn',[
            RedirectIfLoggedIn::class,
            
        ]
        );
        
        $middleware->appendToGroup('checkAdmin',[
            CheckUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();