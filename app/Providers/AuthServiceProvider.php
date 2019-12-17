<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('edit-users',function ($user){
            return $user->hasRole('admin');
        });

        Gate::define('update-post', function ($user,$post) {

            return Auth::id() == $post->user_id || $user->hasRole('admin');
        });

        Gate::define('update-comment', function ($user,$comment) {

            return Auth::id() == $comment->user_id || $user->hasRole('admin');
        });

        //
    }
}
