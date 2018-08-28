<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use PHPUnit\Framework\TestCase;

class CardCollectionTest extends TestCase
{
    /**
     * @var CardCollection
     */
    private $cardCollection;

    protected function setUp()
    {
        $this->cardCollection = new CardCollection();
    }

    public function testCountOnEmpty()
    {
        $this->assertEquals(0, $this->cardCollection->count());
    }

    /**
     * @depends testCountOnEmpty
     */
    public function testAddCard()
    {
        $this->cardCollection->addCard(new Card('A', 'S'));
        $this->cardCollection->addCard(new Card('2', 'S'));

        $this->assertEquals(2, $this->cardCollection->count());

        return $this->cardCollection;
    }

    /**
     * @depends testAddCard
     *
     * @param CardCollection $cardCollection
     */
    public function testGetTopCard(CardCollection $cardCollection)
    {
        $card = $cardCollection->getTopCard();

        $this->assertEquals(new Card('2', 'S'), $card);
    }

    public function testAddCardAffectAttribute()
    {
        $card = new Card('A', 'S');
        $this->cardCollection->addCard($card);
        $this->assertAttributeEquals([$card], 'cards', $this->cardCollection);
    }
}
