<?php
require __DIR__ . '/../vendor/autoload.php';
// use Exception;
use App\Apple;
use App\Container\FruitContainer;
use App\Juicer;
use App\Exceptions\NoFruitException;

echo "— Testing Apple …\n";
$a = new Apple('green',3.14);
echo "Volume: {$a->getVolume()}L, Rotten? ".($a->isRotten()? 'yes':'no')."\n";

echo "— Testing Container …\n";
$ctr = new FruitContainer(5.0);
$ctr->addFruit($a);
echo "Count: {$ctr->getCount()}, Remains: {$ctr->getRemainingCapacity()}L\n";
try {
    $ctr->popFruit();
    $ctr->popFruit();  // should throw
} catch (Exception $e) {
    echo "Caught NoFruitException as expected\n";
}

echo "— Testing Juicer squeeze …\n";
$juicer = new Juicer(10.0);
$juicer->addFruit(new Apple('red',2.5));
try {
    $juice = $juicer->squeezeOne();
    echo "Got $juice L of juice\n";
} catch (App\Exceptions\RottenFruitException $e) {
    echo "Caught rotten exception—no juice from that apple.\n";
}
