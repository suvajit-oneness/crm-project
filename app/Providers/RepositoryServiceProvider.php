<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\AdminContract;
use App\Contracts\BlogCategoryContract;
use App\Repositories\AdminRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;


use App\Contracts\ProjectContract;
use App\Repositories\ProjectRepository;

use App\Contracts\LeadContract;
use App\Repositories\LeadRepository;

use App\Contracts\LeadFeedbackContract;
use App\Repositories\LeadFeedbackRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        AdminContract::class            =>  AdminRepository::class,

        UserContract::class             =>  UserRepository::class,

        ProjectContract::class         =>     ProjectRepository::class,
        LeadContract::class         =>        LeadRepository::class,
        LeadUserContract::class         =>     LeadUserRepository::class,
        LeadFeedbackContract::class         => LeadFeedbackRepository::class,

    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
