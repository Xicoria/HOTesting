<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
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

    public function matchingCardDataProvider()
    {
        return [
            "4 of hearts" => [new Card('4', 'H'), true, 'should match'],
            "5 of hearts" => [new Card('5', 'H'), false, 'should not match'],
            "4 of clubs" => [new Card('5', 'C'), false, 'should not match'],
        ];
    }

    /**
     * @dataProvider matchingCardDataProvider
     *
     * @param Card $matchingCard
     * @param      $expected
     * @param      $msg
     */
    public function testIsNotInMatchingSet(Card $matchingCard, $expected, $msg)
    {
        $this->assertEquals(
            $expected,
            $this->card->isInMatchingSet($matchingCard),
            "<{$matchingCard->getNumber()}{$matchingCard->getSuit()}> " . $msg .
            " <{$this->card->getNumber()}{$this->card->getSuit()}>"
        );
    }
}
