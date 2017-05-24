<?php
namespace negreanucalin\Multidoc\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use Multidoc\Services\MultidocService;
use negreanucalin\Multidoc\Facades\Multidoc;
use negreanucalin\Multidoc\Tests\AbstractTestCase;

class MultidocTest extends AbstractTestCase
{
    use FacadeTrait;

    protected function getFacadeAccessor()
    {
        return 'multidoc';
    }

    protected function getFacadeClass()
    {
        return Multidoc::class;
    }

    protected function getFacadeRoot()
    {
        return MultidocService::class;
    }
}