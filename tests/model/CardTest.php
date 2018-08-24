<?php

use HOTesting\Model\Card;

class CardTest extends \PHPUnit\Framework\TestCase
{
    public function testGetNumber()
    {
        $card = new Card('4', 'S');
        $actualNumber = $card->getNumber();
        $this->assertEquals('4', $actualNumber, 'The number should be <4>');
    }

    public function testSuit()
    {
        $card = new Card('4', 'S');
        $actualSuit = $card->getSuit();
        $this->assertEquals('S', $actualSuit, 'The suit should be <S>');
    }

    public function testIsInMatchingSet()
    {
        $card = new Card('4', 'S');
        $matchingCard = new Card('4', 'H');
        $this->assertTrue($card->isInMatchingSet($matchingCard), '<4S> should match <4H>');
    }

    public function testIsNotInMatchingSet()
    {
        $card = new Card('4', 'S');
        $matchingCard = new Card('5', 'H');
        $this->assertFalse($card->isInMatchingSet($matchingCard), '<4S> should not match <5H>');
    }
}
