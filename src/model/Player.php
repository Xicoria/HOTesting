<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 25/08/2018
 * Time: 16:44
 */

namespace HOTesting\Model;

class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var CardCollection
     */
    private $hand;

    /**
     * Player constructor.
     *
     * @param                $name
     * @param CardCollection $hand
     */
    public function __construct($name, CardCollection $hand)
    {
        $this->name = $name;
        $this->hand = $hand;
    }

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
     * Returns the first card that matches the number on players hand
     *
     * @param $cardNumber
     *
     * @return mixed
     */
    public function getCard($cardNumber)
    {
        foreach ($this->getHand() as $card) {
            if ($card->getNumber() == $cardNumber) {
                return $card;
            }
        }

        return null;
    }

    /**
     * Matches card on other player's hand and take it
     *
     * @param Player $otherPlayer
     * @param        $number
     *
     * @return bool
     */
    public function takeCards(Player $otherPlayer, $number)
    {
        $matchedCard = $otherPlayer->getCard($number);

        if ($matchedCard !== null) {
            $this->hand->addCard($matchedCard);
            $otherPlayer->getHand()->removeCard($matchedCard);

            return true;
        }

        return false;
    }
}
