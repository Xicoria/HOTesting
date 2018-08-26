<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\Player;
use Mockery;
use PHPUnit\Framework\TestCase;

class MockeryPlayerTest extends TestCase
{
    private $hand;

    private $player;

    public function setUp()
    {
        $this->hand = Mockery::mock(CardCollection::class);
        $this->player = new Player('John Smith', $this->hand);
    }

    public function testDrawCard()
    {
        $deck = Mockery::mock(CardCollection::class);
        $deck->shouldReceive('moveTopCardTo')
            ->with($this->hand);

        $this->player->drawCard($deck);
    }

    public function testTakeCardFromPlayer()
    {
        $otherHand = Mockery::mock(CardCollection::class);
        $otherPlayer = Mockery::mock(Player::class);
        $card = Mockery::mock(Card::class);

        $otherPlayer->shouldReceive('getCard')
            ->with(4)
            ->andReturn($card);

        $otherPlayer->shouldReceive('getHand')
            ->andReturn($otherHand);

        $this->hand->shouldReceive('addCard')
            ->with($card);

        $otherHand->shouldReceive('removeCard')
            ->with($card);

        $this->assertTrue($this->player->takeCards($otherPlayer, 4));
    }

}