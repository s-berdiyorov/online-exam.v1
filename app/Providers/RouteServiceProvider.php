<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/dashboard/';
    public const HOME_LOGIN = 'user.auth.login';
    public const HOME_DASHBOARD = 'dashboard';

    /**
     * The path to the "admin" route for your application.
     *
     * @var string
     */
    public const ADMIN = '/admin/dashboard/';
    public const ADMIN_LOGIN = 'admin.auth.login';
    public const ADMIN_DASHBOARD = 'admin.dashboard';


    /**
     * The path to the "moderator" route for your application.
     *
     * @var string
     */
    public const MODERATOR = '/moderator/dashboard/';
    public const MODERATOR_LOGIN = 'moderator.auth.login';
    public const MODERATOR_DASHBOARD = 'moderator.dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapModeratorRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace.'\User')
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->as('admin.')
            ->prefix('admin')
            ->namespace($this->namespace.'\Admin')
            ->group(base_path('routes/admin.php'));
    }

    protected function mapModeratorRoutes()
    {
        Route::middleware('web')
            ->as('moderator.')
            ->prefix('moderator')
            ->namespace($this->namespace.'\Moderator')
            ->group(base_path('routes/moderator.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
