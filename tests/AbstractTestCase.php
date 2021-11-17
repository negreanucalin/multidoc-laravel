<?php

namespace MultidocLaravel\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use MultidocLaravel\MultidocServiceProvider;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    public function setConfig()
    {
        $this->app->config->set('test', 'test');
    }

    protected function getServiceProviderClass()
    {
        return MultidocServiceProvider::class;
    }
}