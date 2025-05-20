<?php 
namespace App;
use App\Exceptions\RottenFruitException;


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

    public function squeeze(): float
    {

        error_log('Apple::squeeze() called – $this->rotten = ' . var_export($this->rotten, true));

        if ($this->rotten) {
            error_log('  -> throwing RottenFruitException');
            throw new RottenFruitException("Cannot squeeze a rotten apple.");
        }

        $juice = $this->getVolume() * 0.5;
        error_log("  -> returning juice: {$juice}");
        return $juice;
    }

    
}
