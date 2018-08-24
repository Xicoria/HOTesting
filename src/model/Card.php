<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 24/08/2018
 * Time: 19:15
 */

namespace HOTesting\Model;

class Card
{
    private $number;

    private $suit;

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

    public function isInMatchingSet(Card $card)
    {
        return $this->getNumber() == $card->getNumber();
    }
}