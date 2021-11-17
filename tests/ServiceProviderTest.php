<?php
namespace MultidocLaravel\Tests;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use MultidocParser\Services\MultidocParserService;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testMultidocClient()
    {
        $this->assertIsInjectable(MultidocParserService::class);
    }
}