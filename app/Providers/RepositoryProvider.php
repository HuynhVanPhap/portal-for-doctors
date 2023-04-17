<?php

namespace App\Providers;

use App\Repositories\Appoitment\AppoitmentInterface;
use App\Repositories\Appoitment\AppoitmentRepository;
use App\Repositories\Doctor\DoctorInterface;
use App\Repositories\Doctor\DoctorRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DoctorInterface::class, DoctorRepository::class);
        $this->app->bind(AppoitmentInterface::class, AppoitmentRepository::class);
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
