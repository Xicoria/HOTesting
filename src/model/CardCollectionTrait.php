<?php

namespace HOTesting\Model;

trait CardCollectionTrait
{
    /**
     * @var array
     */
    protected $cards = [];

    /**
     * @return int
     */
    public function count()
    {
        return count($this->cards);
    }
}