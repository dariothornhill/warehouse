<?php

namespace Dariothornhill\WarehouseLocation;

class Grid {
  public function __construct(int $width, int $height, iterable $items) {
    $this->width = $width;
    $this->height = $height;
    if(count($items) !== $width * $height) throw new \Exception('Invalid number of items');
    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {
            $this->setValue($x,$y,$items[$x * $height + $y]);
        }
    }
  }
      
  public function getWidth() {
      return $this->width;
  }
  
  public function getHeight() {
      return $this->height;
  }
  
  public function getValue(int $x, int $y) {
      return $this->values[$x][$y];
  }
  
  public function setValue(int $x, int $y, int $value) {
      $this->values[$x][$y] = $value;
  }   
}
