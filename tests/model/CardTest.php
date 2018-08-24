<?php

use HOTesting\Model\Card;

class CardTest extends \PHPUnit\Framework\TestCase
{
    private $card;

    protected function setUp()
    {
        parent::setUp();
        $this->card = new Card('4', 'S');
    }

    public function testGetNumber()
    {
        $actualNumber = $this->card->getNumber();
        $this->assertEquals('4', $actualNumber, 'The number should be <4>');
    }

    public function testSuit()
    {
        $actualSuit = $this->card->getSuit();
        $this->assertEquals('S', $actualSuit, 'The suit should be <S>');
    }

    public function testIsInMatchingSet()
    {
        $matchingCard = new Card('4', 'H');
        $this->assertTrue($this->card->isInMatchingSet($matchingCard), '<4S> should match <4H>');
    }

    public function testIsNotInMatchingSet()
    {
        $matchingCard = new Card('5', 'H');
        $this->assertFalse($this->card->isInMatchingSet($matchingCard), '<4S> should not match <5H>');
    }
}
