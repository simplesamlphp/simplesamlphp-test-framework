<?php

declare(strict_types=1);

namespace SimpleSAML\Test\TestUtils;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use SimpleSAML\Configuration;
use SimpleSAML\Store\StoreFactory;
use SimpleSAML\TestUtils\InMemoryStore;

use function sleep;
use function time;

#[CoversClass(InMemoryStore::class)]
class InMemoryStoreTest extends TestCase
{
    protected function tearDown(): void
    {
        InMemoryStore::clearInternalState();
        Configuration::clearInternalState();
    }


    public function testState(): void
    {
        // given: an SSP config that overrides the store type
        $config = [
            'store.type' => 'SimpleSAML\TestUtils\InMemoryStore',
        ];
        Configuration::loadFromArray($config, '[ARRAY]', 'simplesaml');

        // when: getting the store
        $store = StoreFactory::getInstance('SimpleSAML\TestUtils\InMemoryStore');

        // then: will give us the right type of store
        $this->assertInstanceOf(InMemoryStore::class, $store);

        // and: we can store stuff
        $this->assertNull($store->get('string', 'key'), 'Key does not exist yet');
        $store->set('string', 'key', 'value');
        $this->assertEquals('value', $store->get('string', 'key'));
        $store->delete('string', 'key');
        $this->assertNull($store->get('string', 'key'), 'Key was removed');
    }


    public function testExpiration(): void
    {
        $store = new InMemoryStore();
        $store->set('string', 'key', 'value', time() + 1);
        $this->assertEquals('value', $store->get('string', 'key'));
        $this->assertEquals('value', $store->get('string', 'key'));
        sleep(2);
        $this->assertNull($store->get('string', 'key'));
    }
}
