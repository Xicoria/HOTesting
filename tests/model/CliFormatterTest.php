<?php

namespace HOTesting\Tests\Model;

use function foo\func;
use HOTesting\Model\Card;
use HOTesting\Model\CardCollection;
use HOTesting\Model\CliFormatter;
use HOTesting\Model\HumanPlayer;
use PHPUnit\Framework\TestCase;

class CliFormatterTest extends TestCase
{
    private $formatter;

    protected function setUp()
    {
        $this->formatter = new CliFormatter();
    }

    public function testAnnouncePlayerHand()
    {
        $cards = new CardCollection();
        $cards->addCard(new Card('A', 'S'));
        $cards->addCard(new Card('2', 'S'));

        $player = $this->createMock(HumanPlayer::class);

        $player->expects($this->once())
            ->method('getHand')
            ->willReturn($cards);

        $this->expectOutputString("Current hand: AS 2S\n\n");
        $this->formatter->announcePlayerHand($player);
    }

    public function testAnnouncePlayerHandCallback()
    {
        $cards = new CardCollection();
        $cards->addCard(new Card('A', 'S'));
        $cards->addCard(new Card('2', 'S'));

        $player = $this->createMock(HumanPlayer::class);

        $player->expects($this->once())
            ->method('getHand')
            ->willReturn($cards);

        $this->expectOutputString("Current hand: AS 2S");
        $this->setOutputCallback(function ($output){
            return trim($output);
        });

        $this->formatter->announcePlayerHand($player);
    }
}