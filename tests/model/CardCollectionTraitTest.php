<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\CardCollectionTrait;
use PHPUnit\Framework\TestCase;

class CardCollectionTraitTest extends TestCase
{
    private $cardCollection;

    protected function setUp()
    {
        $this->cardCollection = $this->getObjectForTrait(CardCollectionTrait::class);
    }

    public function testCountOnEmpty()
    {
        $this->assertEquals(0, $this->cardCollection->count());
    }
}