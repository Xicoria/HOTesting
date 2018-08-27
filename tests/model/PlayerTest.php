<?php

namespace HOTesting\Tests\Model;

use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\Player;
use http\Exception\RuntimeException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    private $hand;

    /**
     * @var MockObject
     */
    private $player;

    public function setUp()
    {
        $this->hand = new CardCollection();
        $this->hand->addCard(new Card('A', 'S'));
        $this->player = $this->getMockForAbstractClass(
            Player::class,
            [
                'John Smith',
                $this->hand,
            ]
        );
    }

    public function testRequestCardCallsChooseCardNumber()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('A'));

        $this->assertEquals('A', $this->player->requestCard());
    }

    public function testRequestCardThrowsInvalidCard()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('2'));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Invalid card chosen by player');

        $this->player->requestCard();
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Invalid card chosen by player
     */
    public function testRequestCardThrowsInvalidCardUsingAnnotation()
    {
        $this->player->expects($this->once())
            ->method('chooseCardNumber')
            ->will($this->returnValue('2'));

        $this->player->requestCard();
    }
}