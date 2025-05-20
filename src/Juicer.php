<?php 
namespace App;
use App\Container\FruitContainer;
use App\Strainer\Strainer;

class Juicer {
    private FruitContainer $container;
    private Strainer $strainer;

    public function __construct(float $capacity) {
        $this->container = new FruitContainer($capacity);
        $this->strainer = new Strainer();
    }

    public function addFruit(Fruit $fruit): void {
        $this->container->addFruit($fruit);
    }

    public function squeezeOne(): float{
        $fruit = $this->container->popFruit();
        return $this->strainer->squeeze($fruit);
    }

    public function getContainerStatus(): array {
        return [
            'count' => $this->container->getCount(),
            'remaining' => $this->container->getRemainingCapacity(),
        ];
    }
}
