<?php

namespace HOTesting\Model;

class CardCollection
{
    /**
     * @var array
     */
    private $cards;

    /**
     * CardCollection constructor.
     */
    public function __construct()
    {
        $this->cards = [];
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->cards);
    }

    /**
     * Add card to hand
     *
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * Retrieve top card from the hand
     *
     * @return mixed
     */
    public function getTopCard()
    {
        return array_pop($this->cards);
    }

    /**
     * Remove top card and move to $hand
     *
     * @param CardCollection $hand
     */
    public function moveTopCardTo(CardCollection $hand)
    {
        $hand->addCard($this->getTopCard());
    }

    /**
     * Remove $cardToRemove from hand
     *
     * @param Card $cardToRemove
     *
     * @return array
     */
    public function removeCard(Card $cardToRemove)
    {
        return array_filter(
            $this->cards,
            function ($card) use ($cardToRemove) {
                return $card->getSuit() != $cardToRemove->getSuit() &&
                    $card->getNumber() != $cardToRemove->getNumber();
            }
        );
    }
}