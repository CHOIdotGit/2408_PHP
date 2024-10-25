<?php
require_once("./Whale.php");
require_once("./FlyingSquirrel.php");
require_once("./GoldFish.php");

use PHP\OOP\Whale;
use PHP\OOP\FlyingSquirrel;
use PHP\OOP\GoldFish;

$whale = new Whale("고래", "바다");
echo $whale->printInfo()."\n";

$flyingSquirrel = new FlyingSquirrel('날다람쥐', '산');
echo $flyingSquirrel->printInfo()."\n";

$goldfish = new GoldFish();
echo $goldfish->printPet()."\n";
