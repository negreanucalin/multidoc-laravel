<?php
namespace negreanucalin\Multidoc\Tests;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use Multidoc\Services\MultidocService;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testMultidocClient()
    {
        $this->assertIsInjectable(MultidocService::class);
    }
}