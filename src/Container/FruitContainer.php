<?php 
namespace App\Container;

use App\Fruit;
use App\Exceptions\ContainerFullException;
use App\Exceptions\NoFruitException;

class FruitContainer {
    private float $capacity;
    private array $fruits = [];

    public function __construct(float $capacity){
        $this->capacity = $capacity;
    }

    public function getCount(): int {
        return count($this->fruits);
    }

    public function getRemainingCapacity(): float{
        $used = array_reduce($this->fruits, fn(float $sum, Fruit $fruit) => $sum+$fruit->getVolume(), 0.0);
        return $this->capacity - $used;
    }

    public function popFruit(): Fruit {
        if(empty($this->fruits)) {
            throw new NoFruitException("No fruits are available for squeezing");
        }
        return array_shift($this->fruits);
    }
    
    public function addFruit(Fruit $fruit){
        if($this->getRemainingCapacity() < $fruit->getVolume()) {
            throw new ContainerFullException("Not enough space in container.");
        }
        $this->fruits[] = $fruit;
    }
}
