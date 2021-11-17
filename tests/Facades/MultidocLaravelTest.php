<?php
namespace MultidocLaravel\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use MultidocLaravel\Facades\MultidocLaravelFacade;
use MultidocLaravel\Tests\AbstractTestCase;
use MultidocParser\Services\MultidocParserService;

class MultidocLaravelTest extends AbstractTestCase
{
    use FacadeTrait;

    protected function getFacadeAccessor()
    {
        return 'multidoc';
    }

    protected function getFacadeClass()
    {
        return MultidocLaravelFacade::class;
    }

    protected function getFacadeRoot()
    {
        return MultidocParserService::class;
    }
}