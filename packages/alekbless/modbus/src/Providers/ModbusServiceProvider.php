<?php

namespace Alekbless\Modbus\Providers;

use Illuminate\Support\ServiceProvider;
use Alekbless\Modbus\Models\Modbus;

class ModbusServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('modbus', function ($app) {
            return new Modbus;
        });
    }
}
