<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Profile::resolveRelationUsing('user', function (Profile $model) {
            return $model->belongsTo(User::class);
        });

        User::resolveRelationUsing('profile', function (User $model) {
            return $model->hasOne(Profile::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
