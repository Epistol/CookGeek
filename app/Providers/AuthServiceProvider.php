<?php

namespace App\Providers;

use App\Policies\RecipePolicy;
use App\Recipe;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Recipe::class => RecipePolicy::class,
        \BinaryTorch\Blogged\Models\Article::class => \App\Policies\BloggedArticlePolicy::class,
        \BinaryTorch\Blogged\Models\Category::class => \App\Policies\BloggedCategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole('super-admin') ? true : null;
        });

        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return 'App\\Policies\\' . class_basename ( $modelClass).'Policy';
        });
    }
}
