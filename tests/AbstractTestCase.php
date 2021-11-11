<?php

namespace Multidoc\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Multidoc\MultidocServiceProvider;

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