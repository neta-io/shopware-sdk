<?php

namespace Neta\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Neta\Shopware\SDK\Entity\Article;

/**
 * Class ArticleTest.
 */
class ArticleTest extends TestCase
{
    public function testThatArrayCopyDoesNotReturnArrayElementsWithNullValue()
    {
        $attributes['id'] = 1;
        $attributes['name'] = 'foo';
        $attributes['taxId'] = null;

        $entity = new Article();
        $entity->setEntityAttributes($attributes);
        $arrayCopy = $entity->getArrayCopy();

        static::assertArrayNotHasKey('taxId', $arrayCopy);
        static::assertArrayHasKey('name', $arrayCopy);
        static::assertArrayHasKey('id', $arrayCopy);
    }
}
