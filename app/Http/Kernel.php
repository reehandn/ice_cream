<?php

namespace App\Http;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware will run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        'AdminMiddleware' => \App\Http\Middleware\AdminMiddleware::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Middleware lain...
        'AdminMiddleware' => \App\Http\Middleware\AdminMiddleware::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
    ];
    

    /**
     * Register the application's commands.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Menjadwalkan tugas-tugas Artisan di sini
    }


    /**
     * Register the application’s commands.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }

}