<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    TopicRepository,
    UserRepository,
    AddressRepository
};

use App\Repositories\Eloquent\{
    EloquentTopicRepository,
    EloquentUserRepository,
    EloquentAddressRepository
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TopicRepository::class, EloquentTopicRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(AddressRepository::class, EloquentAddressRepository::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
