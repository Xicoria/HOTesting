<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\Player;
use Phake;
use PHPUnit\Framework\TestCase;

class PhakePlayerTest extends TestCase
{
    private $player;

    /**
     * @Mock HOTesting\Model\CardCollection
     */
    private $hand;

    public function setUp()
    {
        Phake::initAnnotations($this);
        $this->player = new Player('John Smith', $this->hand);
    }

    public function testDrawCard()
    {
        $deck = Phake::mock(CardCollection::class);
        $this->player->drawCard($deck);
        Phake::verify($deck)
            ->moveTopCardTo($this->identicalTo($this->hand));
    }

    public function testTakeCardFromPlayer()
    {
        $otherHand = Phake::mock(CardCollection::class);
        $otherPlayer = Phake::mock(Player::class);
        $card = Phake::mock(Card::class);

        Phake::when($otherPlayer)
            ->getCard(Phake::anyParameters())
            ->thenReturn($card);

        Phake::when($otherPlayer)
            ->getHand()
            ->thenReturn($otherHand);

        $this->assertTrue($this->player->takeCards($otherPlayer, 4));

        Phake::verify($this->hand)
            ->addCard($this->identicalTo($card));
        Phake::verify($otherHand)
            ->removeCard($this->identicalTo($card));
    }
}