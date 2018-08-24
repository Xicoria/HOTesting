<?php

namespace HOTesting\Model;

class CardCollection
{
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
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * @return mixed
     */
    public function getTopCard()
    {
        return array_pop($this->cards);
    }
}