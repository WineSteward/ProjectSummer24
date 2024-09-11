<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        // Paginator::useBootstrapFive();
   
        //Gate was substituted with a JobPolicy
/*         Gate::define('edit-job', function(User $user, Job $job) {

            return ($job->employer->user->is($user));
        });
 */
        

    }

}
