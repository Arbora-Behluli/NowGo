protected $routeMiddleware = [
  
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'superadmin' => \App\Http\Middleware\SuperAdminMiddleware::class
    'setlocale' => \App\Http\Middleware\SetLocale::class
];

'api' => [
    \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
    'throttle:api',
    \Illuminate\Routing\Middleware\SubstituteBindings::class,
],


