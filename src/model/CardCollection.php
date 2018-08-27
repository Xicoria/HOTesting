<?php

namespace HOTesting\Model;

use Traversable;

class CardCollection implements \IteratorAggregate
{
    use CardCollectionTrait;

    /**
     * @var array
     */
    protected $cards;

    /**
     * CardCollection constructor.
     */
    public function __construct()
    {
        $this->cards = [];
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

    /**
     * Retrieve an external iterator
     * @link  http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->cards);
    }
}