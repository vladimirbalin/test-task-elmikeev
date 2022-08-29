<?php

namespace App\Providers;

use AmoCRM\Client\AmoCRMApiClient;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use League\OAuth2\Client\Token\AccessToken;

class AmoCrmServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(AmoCRMApiClient::class, function($app){
            $apiClient = new AmoCRMApiClient(
                config('amocrm.id'),
                config('amocrm.secret'),
                config('amocrm.redirect_url'));
            $apiClient->setAccountBaseDomain(config('amocrm.base_url'));

            $user = User::first();

            if ($user->hasNotAccessToken()) {
                $accessToken = $apiClient
                    ->getOAuthClient()
                    ->getAccessTokenByCode(config('amocrm.auth'));

            } elseif ($user->tokenHasExpired()) {
                $accessToken = $apiClient
                    ->getOAuthClient()
                    ->getAccessTokenByRefreshToken($user->refresh_token);
            } else {
                $accessToken = new AccessToken([
                    'access_token' => $user->access_token,
                    'expires' => $user->token_expires,
                    'refresh_token' => $user->refresh_token,
                    'token_type' => $user->token_type
                ]);
            }

            $apiClient->setAccessToken($accessToken);
            $user->updateToken(
                $accessToken->getToken(),
                $accessToken->getExpires(),
                $accessToken->getRefreshToken(),
                $accessToken->getValues()['token_type']
            );
            return $apiClient;
        });
    }
}
