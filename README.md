# Laravel Multidoc

## Not yet stable, in testing phase!

#### Laravel wrapper that uses the [Multidoc parser](https://github.com/negreanucalin/multidoc-parser) and [Multidoc viewer](https://github.com/negreanucalin/multidoc-viewer)

#### Instalation

Just add `"negreanucalin/multidoc-laravel": "^1.0"` in your `composer.json`

#### Laravel configuration

* Add the service provider and alias
    * Providers ` \MultidocLaravel\MultidocServiceProvider::class `
    * Aliases ` 'MultidocLaravel'=>\Multidoc\Facades\MultidocLaravelFacade::class `

* Publish vendors
Run:
` php artisan vendor:publish --tag=multidoc `

* (SPA+Api integration)

  `Route::get('/{any}', function () {
        return ...
    })->where('any', '^(?!api|multidoc).*$');`

* Generate documentation
	* Documentation folder is `documentation` inside the root of your application (check [Multidoc parser](https://github.com/negreanucalin/multidoc-parser) )
	* Run:
` php artisan multidoc:generate `

* Test it
	* Go to:
` {{yourAppName}}/multidoc `