<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\Player;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase {
    private $hand;

    private $player;

    public function setUp()
    {
        $this->hand = new CardCollection();
        $this->hand->addCard(new Card('A', 'S'));
        $this->player = $this->getMockForAbstractClass(Player::class, [
            'John Smith', $this->hand
        ]);
    }

    public function testRequestCardCallsChooseCardNumber()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('A'));

        $this->assertEquals('A', $this->player->requestCard());
    }

}