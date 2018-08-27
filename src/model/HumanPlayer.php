<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 25/08/2018
 * Time: 16:44
 */

namespace HOTesting\Model;

class HumanPlayer extends Player
{
    /**
     * Get the top $deck's card into the player's hand
     *
     * @param CardCollection $deck
     */
    public function drawCard(CardCollection $deck)
    {
        $deck->moveTopCardTo($this->hand);
    }

    /**
     * @return CardCollection
     */
    public function getHand()
    {
        return $this->hand;
    }

    /**
     * Matches card on other player's hand and take it
     *
     * @param HumanPlayer $otherPlayer
     * @param        $number
     *
     * @return bool
     */
    public function takeCards(HumanPlayer $otherPlayer, $number)
    {
        $matchedCard = $otherPlayer->getCard($number);

        if ($matchedCard !== null) {
            $this->hand->addCard($matchedCard);
            $otherPlayer->getHand()->removeCard($matchedCard);

            return true;
        }

        return false;
    }

    protected function chooseCardNumber()
    {
        // TODO: Implement chooseCardNumber() method.
    }
}
