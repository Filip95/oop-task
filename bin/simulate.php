<?php
require __DIR__ . '/../vendor/autoload.php';
// use Exception;
use App\Apple;
use App\Container\FruitContainer;
use App\Juicer;
use App\Exceptions\NoFruitException;
use App\Exceptions\RottenFruitException;
use App\Exceptions\ContainerFullException;
//Initial testing with dummy data.
// echo "— Testing Apple …\n";
// $a = new Apple('green',3.14);
// echo "Volume: {$a->getVolume()}L, Rotten? ".($a->isRotten()? 'yes':'no')."\n";

// echo "— Testing Container …\n";
// $ctr = new FruitContainer(5.0);
// $ctr->addFruit($a);
// echo "Count: {$ctr->getCount()}, Remains: {$ctr->getRemainingCapacity()}L\n";
// try {
//     $ctr->popFruit();
//     $ctr->popFruit();  // should throw
// } catch (Exception $e) {
//     echo "Caught NoFruitException as expected\n";
// }

// echo "— Testing Juicer squeeze …\n";
// $juicer = new Juicer(10.0);
// $juicer->addFruit(new Apple('red',2.5));
// try {
//     $juice = $juicer->squeezeOne();
//     echo "Got $juice L of juice\n";
// } catch (App\Exceptions\RottenFruitException $e) {
//     echo "Caught rotten exception—no juice from that apple.\n";
// }

$juicer = new Juicer(20.0);
$squeezes = 0;
$colors = ['red', 'green', 'yellow', 'golden'];
// Seed the juicer with a few apples initially

while (true) {
  try{
      $color  = $colors[random_int(0, count($colors) - 1)];
      $volume = mt_rand(1, 5);
      $juicer->addFruit(new Apple($color, $volume));
  } catch (ContainerFullException $e) {
    break;//Stop seeding if container is full
  }
}

for ($i = 1; $i <= 100; $i++) {
    try {
        $juice = $juicer->squeezeOne();
        echo "Action {$i}: squeezed yields {$juice}L\n";
        $squeezes++;
    } catch (NoFruitException $e) {
        echo "Action {$i}: nothing to squeeze\n";
    } catch (RottenFruitException $e) {
        echo "Action {$i}: rotten apple, no juice\n";
    }

    // Add a fresh apple if it's the 9th squeeze OR container has run dry
    $containerCount = $juicer->getContainerStatus()['count'];
    if (($squeezes > 0 && $squeezes % 9 === 0) || $containerCount === 0) {
        try {
            $color = $colors[random_int(0, count($colors) - 1)];
            $volume = mt_rand(1, 5);
            $newApple = new Apple($color, $volume);
            $juicer->addFruit($newApple);
            echo "  → Added apple (vol {$newApple->getVolume()}L, "
               . "color {$newApple->getColor()}, rotten? "
               . ($newApple->isRotten() ? 'yes' : 'no') . ")\n";
        } catch (ContainerFullException $ex) {
            echo "  → Could not add apple: container full\n";
        }
    }
}
