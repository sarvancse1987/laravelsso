<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // if (!$this->app->routesAreCached()) {
        //     Passport::routes();
        // }

        // $this->registerPolicies();

        // /** @var CachesRoutes $app */
        // $app = $this->app;
        // if (!$app->routesAreCached()) {
        //     Passport::routes();
        // }

        //Passport::loadKeysFrom(__DIR__.'/../secrets/oauth');

        // Passport::useTokenModel(Token::class);
        // Passport::useRefreshTokenModel(RefreshToken::class);
        // Passport::useAuthCodeModel(AuthCode::class);
        // Passport::useClientModel(Client::class);
        // Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }

    public function register(): void
    {
        Passport::ignoreRoutes();
    }
}
