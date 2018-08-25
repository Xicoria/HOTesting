<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    private $hand;

    private $player;

    protected function setUp()
    {
        $this->hand = $this->createMock(CardCollection::class);
        $this->player = new Player('John Smith', $this->hand);
    }

    public function testDrawCard()
    {
        $deck = $this->createMock(CardCollection::class);

        $deck->expects($this->once())
            ->method('moveTopCardTo')
            ->with($this->identicalTo($this->hand));

        $this->player->drawCard($deck);
    }

    public function testTakeCardFromPlayer()
    {
        $otherHand = $this->createMock(CardCollection::class);
        $otherPlayer = $this->getMockBuilder(Player::class)
            ->setConstructorArgs(['Jane Smith', $otherHand])
            ->getMock();
        $card = $this->createMock(Card::class);

        $otherPlayer->expects($this->once())
            ->method('getCard')
            ->with($this->equalTo(4))
            ->will($this->returnValue($card));

        $otherPlayer->expects($this->once())
            ->method('getHand')
            ->will($this->returnValue($otherHand));

        $this->hand->expects($this->once())
            ->method('addCard')
            ->with($this->identicalTo($card));

        $otherHand->expects($this->once())
            ->method('removeCard')
            ->with($this->identicalTo($card));

        $this->assertTrue($this->player->takeCards($otherPlayer, 4));
    }
}
