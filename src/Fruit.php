<?php
namespace App;
use App\Interfaces\IsSqueezable;


abstract class Fruit implements IsSqueezable{
    protected string $color;
    protected float $volume;

    public function __construct(string $color, float $volume){
        $this->color = $color;
        $this->volume = $volume;
    }

    public function getColor(): string {
        return $this->color;
    }
    
    public function getVolume(): float {
        return $this->volume;
    }

    abstract public function squeeze(): float;
}
