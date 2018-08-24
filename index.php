<?php

namespace HOTesting;

require 'vendor/autoload.php';

$card1 = new Model\Card(4, 'C');

echo "Card: ".$card1->getNumber().$card1->getSuit();
echo PHP_EOL;


