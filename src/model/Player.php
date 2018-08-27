<?php
/**
 * Created by PhpStorm.
 * User: francisco
 * Date: 26/08/2018
 * Time: 23:47
 */

namespace HOTesting\Model;

abstract class Player
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var CardCollection
     */
    protected $hand;

    /**
     * @param $name
     * @param CardCollection $hand
     */
    public function __construct($name, CardCollection $hand)
    {
        $this->name = $name;
        $this->hand = $hand;
    }


    public function requestCard()
    {
        $cardNumber = $this->chooseCardNumber();

        if (!$this->hasCard($cardNumber)) {
            throw new \RuntimeException('Invalid card chosen by player');
        }

        return $cardNumber;
    }

    /**
     * @param $cardNumber
     *
     * @return bool
     */
    public function hasCard($cardNumber)
    {
        return $this->getCard($cardNumber) !== null;
    }

    /**
     * @param $cardNumber
     *
     * @return Card|null
     */
    public function getCard($cardNumber)
    {
        /* @var $card Card */
        foreach ($this->hand as $card) {
            if ($card->getNumber() == $cardNumber) {
                return $card;
            }
        }

        return null;
    }

    abstract protected function chooseCardNumber();
}