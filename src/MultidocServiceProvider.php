<?php

namespace Multidoc;

use Illuminate\Support\ServiceProvider;
use Multidoc\Services\DIService;
use Multidoc\Services\MultidocService;
use Illuminate\Foundation\Application as LaravelApplication;

class MultidocServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Multidoc\Commands\GenerateDocumentationCommand',
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/../config/multidoc.php');
        $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'multidoc');
        $vendorPath = app_path() . '/../vendor/negreanucalin/multidoc-viewer';
        if($this->app instanceof LaravelApplication && $this->app->runningInConsole()){
            // Config
            $this->publishes(array($source=>config_path('multidoc.php')));
            // Statics
            $this->publishes([
                $vendorPath.'/public/css/app.css' => public_path('vendor/multidoc/app.css'),
                $vendorPath.'/public/js/app.js' => public_path('vendor/multidoc/app.js'),
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
            return (new DIService)->load()->get('multidoc_service');
        });
        $this->app->alias('multidoc', MultidocService::class);
    }

    public function provides()
    {
        return array('multidoc', MultidocService::class);
    }
}
