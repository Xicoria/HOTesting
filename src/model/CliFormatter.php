<?php

namespace HOTesting\Model;

class CliFormatter
{
    public function announcePlayerHand(Player $player)
    {
        echo "Current hand: " . $this->getCards($player->getHand()) . "\n\n";
    }

    private function getCards(CardCollection $cards)
    {
        $out = [];
        foreach ($cards as $card) {
            $out[] = $card->getNumber() . $card->getSuit();
        }

        return implode(' ', $out);
    }
}