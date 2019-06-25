<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends ServiceProvider {
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen
        = [
            'App\Events\Event'                  => [
                'App\Listeners\EventListener',
            ],
            'Illuminate\Auth\Events\Registered' => [
                'App\Listeners\LogRegisteredUser',
            ],

            'Illuminate\Auth\Events\Attempting' => [
                'App\Listeners\LogAuthenticationAttempt',
            ],

            'Illuminate\Auth\Events\Authenticated' => [
                'App\Listeners\LogAuthenticated',
            ],

            'Illuminate\Auth\Events\Login' => [
                'App\Listeners\LogSuccessfulLogin',
            ],

            'Illuminate\Auth\Events\Failed' => [
                'App\Listeners\LogFailedLogin',
            ],

            'Illuminate\Auth\Events\Logout' => [
                'App\Listeners\LogSuccessfulLogout',
            ],

            'Illuminate\Auth\Events\Lockout' => [
                'App\Listeners\LogLockout',
            ],

            'Illuminate\Auth\Events\PasswordReset' => [
                'App\Listeners\LogPasswordReset',
            ],




            SocialiteWasCalled::class => [
                // add your listeners (aka providers) here
                'SocialiteProviders\\Instagram\\InstagramExtendSocialite@handle',
            ],

        ];
}
