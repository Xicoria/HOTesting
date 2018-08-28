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
            $out[] = $this->getCard($card);
        }

        return implode(' ', $out);
    }

    /**
     * @param $card
     *
     * @return string
     */
    private function getCard($card): string
    {
        return $card->getNumber() . $card->getSuit();
    }
}