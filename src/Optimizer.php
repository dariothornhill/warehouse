<?php

namespace Dariothornhill\WarehouseLocation;

require_once('vendor/autoload.php');

use \Dariothornhill\WarehouseLocation\Grid as Grid;

class Optimizer {
    
    private static function get_rectiliner_distance($pos1, $pos2): int {
      return abs($pos1[0] - $pos2[0]) + abs($pos1[1] - $pos2[1]);
    }

    private static function get_cost(int $x, int $y, Grid $grid): int {
      $current = [];
      for ($i = 0; $i < $grid->getWidth(); $i++) {
          for ($j = 0; $j < $grid->getHeight(); $j++) {
              $current[] = self::get_rectiliner_distance([$x,$y],[$i,$j]) * $grid->getValue($i, $j);
          }
      }

      return array_sum($current);
    }
    
    public static function find_best_location(Grid $grid): array {
      $costs = array();
      $min = array();
      for ($i = 0; $i < $grid->getWidth(); $i++) {
        for ($j = 0; $j < $grid->getHeight(); $j++) {
            $costs[$i][$j] = self::get_cost($i, $j, $grid);
            if (empty($min) || $costs[$i][$j] < $min[1]) {
                $min = array("({$i},{$j})" , $costs[$i][$j]);
            }
        }
      }
      return $min;
    }
}