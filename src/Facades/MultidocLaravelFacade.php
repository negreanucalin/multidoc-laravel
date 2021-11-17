<?php
namespace MultidocLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class MultidocLaravelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'multidoc';
    }
}