<?php

namespace negreanucalin\Multidoc;

use Illuminate\Support\ServiceProvider;
use Multidoc\Services\DIService;
use Multidoc\Services\MultidocService;
use Illuminate\Foundation\Application as LaravelApplication;

class MultidocServiceProvider extends ServiceProvider
{

    protected $commands = [
        'negreanucalin\Multidoc\Commands\GenerateDocumentationCommand',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/../../config/multidoc.php');
        $this->loadRoutesFrom(__DIR__.'/../../config/routes.php');
        $vendorPath = app_path() . '/../vendor/negreanucalin/multidoc-viewer';
        if($this->app instanceof LaravelApplication && $this->app->runningInConsole()){
            $this->publishes(array($source=>config_path('multidoc.php')));
            $this->publishes([
                $vendorPath.'/public' => public_path('multidoc/public'),
                $vendorPath.'/index.html'=> public_path('multidoc').'/index.html',
            ], 'multidoc');
        }
//        elseif ($this->app instanceof LumenApplication){
//            $this->app->configure('multidoc');
//        }
        $this->mergeConfigFrom($source, 'multidoc');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
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
