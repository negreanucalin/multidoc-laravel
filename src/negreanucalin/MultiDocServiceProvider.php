<?php

namespace negreanucalin\Multidoc;

use Illuminate\Support\ServiceProvider;
use Multidoc\Services\DIService;
use Multidoc\Services\MultidocService;

class MultiDocServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/../../config/multidoc.php');
        if($this->app instanceof LaravelApplication && $this->app->runningInConsole()){
            $this->publishes(array($source=>config_path('multidoc.php')));
        } elseif ($this->app instanceof LumenApplication){
            $this->app->configure('multidoc');
        }
        $this->mergeConfigFrom($source, 'multidoc');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('multidoc', function ($app){
            $service = DIService::load();
            return $service->get('multidoc_service');
        });
        $this->app->alias('multidoc', MultidocService::class);
    }

    public function provides()
    {
        return array('multidoc', MultidocService::class);
    }
}
