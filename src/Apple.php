<?php 
namespace App;


class Apple extends Fruit {
    private bool $rotten;

    public function __construct(string $color, float $volume){
        parent::__construct($color, $volume);
        //returns true or false, comparing random number from 1 to 100 with 20, so 20% chance to get true(rotten), 80% chance false(fresh)
        $this->rotten = (random_int(1,100) <= 20);
    }

    public function isRotten(): bool {
        return $this->rotten;
    }

    public function squeeze(): float {
        if($this->rotten){
            //Will replace this with Exception handling later
            die("Cannot squeeze, apple is rotten");
        }
        //Amount of juice is 50% of fruit volume
        return $this->getVolume() * 0.5;
    }
}
