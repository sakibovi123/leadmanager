<?php

namespace App\Providers;


use App\Http\Controllers\Interface\LeadInterface;
use App\Http\Controllers\Interface\TestLeadInterface;

use App\Http\Controllers\Repository\LeadRepository;
use App\Http\Controllers\Repository\TestLeadRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TestLeadInterface::class, TestLeadRepository::class);
        $this->app->bind(LeadInterface::class, LeadRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
