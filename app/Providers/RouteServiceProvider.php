<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/architecture-concepts/service_provider.php'));


            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/basics/routing.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/basics/request_response.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/basics/logging.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/basics/middleware.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/basics/session.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/digging-deeper/events.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/digging-deeper/filestorage.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/digging-deeper/mail.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/digging-deeper/notifications.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/digging-deeper/queues.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/database/query_builder.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/eloquent/eloquent.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/eloquent/relationships.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
