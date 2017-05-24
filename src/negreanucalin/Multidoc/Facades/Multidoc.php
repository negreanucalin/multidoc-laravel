<?php
namespace negreanucalin\Multidoc\Facades;

use Illuminate\Support\Facades\Facade;

class Multidoc extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'multidoc';
    }
}