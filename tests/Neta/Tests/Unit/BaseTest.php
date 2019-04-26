<?php

namespace Neta\Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use Neta\Shopware\SDK\ShopwareClient;

/**
 * Copyright 2016 LeadCommerce.
 *
 * @author    Alexander Mahrt <amahrt@leadcommerce.de>
 * @copyright 2016 LeadCommerce <amahrt@leadcommerce.de>
 */
abstract class BaseTest extends TestCase
{
    /**
     * @var ShopwareClient
     */
    protected $mockClient = null;

    /**
     * @var MockHandler
     */
    protected $mockHandler;

    /**
     * @return ShopwareClient
     */
    public function getMockClient()
    {
        if (! $this->mockClient) {
            $this->mockClient = new ShopwareClient('', 'test', 'test');
            $mock = $this->mockHandler;
            $handler = HandlerStack::create($mock);
            $client = new Client(['handler' => $handler, 'base_uri' => 'http://shopware-shop.dev/api/']);
            $this->mockClient->setClient($client);
        }

        return $this->mockClient;
    }
}
