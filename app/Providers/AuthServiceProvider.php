<?php

namespace App\Providers;

use App\Models\Notebook;
use App\Models\User;
use App\Policies\NotebookPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Notebook::class => NotebookPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        // You can manually register Policy using the below code
        // Gate::policy(Notebook::class, NotebookPolicy::class);
    }
}
