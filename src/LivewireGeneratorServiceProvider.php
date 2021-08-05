<?php

namespace Lenius\LivewireGenerator;

use Illuminate\Support\ServiceProvider;

class LivewireGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Lenius\LivewireGenerator\Commands\LivewireSingle::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/livewire-generator.php' => config_path('livewire-generator.php'),
            ], 'config');
        };
    }
}
