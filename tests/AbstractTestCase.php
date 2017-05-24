<?php

namespace negreanucalin\Multidoc\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use negreanucalin\Multidoc\MultiDocServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    public function setConfig()
    {
        $this->app->config->set('test', 'test');
    }

    protected function getServiceProviderClass($app)
    {
        MultiDocServiceProvider::class;
    }
}