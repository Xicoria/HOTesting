<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\Player;
use PHPUnit\Framework\TestCase;

class PhakePlayerTest extends TestCase {
    private $hand;

    /**
     * @var Phake_IMock
     */
    private $player;

    public function setUp()
    {
        $this->hand = new CardCollection();
        $this->hand->addCard(new Card('A', 'S'));
        $this->player = \Phake::partialMock(Player::class, 'John Smith', $this->hand);
    }

    public function testRequestCardCallsChooseCardNumber()
    {
        \Phake::when($this->player)
            ->chooseCardNumber()
            ->thenReturn('A');

        $this->assertEquals('A', $this->player->requestCard());

        \Phake::verify($this->player)->chooseCardNumber();
    }

}