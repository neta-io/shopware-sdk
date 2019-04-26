<?php

namespace Neta\Tests\Unit;

use Neta\Shopware\SDK\Entity\Article;
use PHPUnit\Framework\TestCase;

/**
 * Class ArticleTest
 *
 * @package Neta\Tests\Unit
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
