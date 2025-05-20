<?php 
namespace App\Strainer;
use App\Interfaces\IsSqueezable;


class Strainer {
    public function squeeze(IsSqueezable $item): float {
        return $item->squeeze();
    }
}
