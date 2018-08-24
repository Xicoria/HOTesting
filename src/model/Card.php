<?php

namespace HOTesting\Model;

class Card
{
    private $number;

    private $suit;

    /**
     * Card constructor.
     *
     * @param $number
     * @param $suit
     */
    public function __construct($number, $suit)
    {
        $this->number = $number;
        $this->suit = $suit;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @param Card $card
     *
     * @return bool
     */
    public function isInMatchingSet(Card $card)
    {
        return $this->getNumber() == $card->getNumber();
    }
}