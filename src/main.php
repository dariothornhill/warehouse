<?php
namespace Dariothornhill\WarehouseLocation;

require_once('vendor/autoload.php');

use \Dariothornhill\WarehouseLocation\Grid as Grid;
use \Dariothornhill\WarehouseLocation\Optimizer as Optimizer;

function main() {
  $grid = new Grid(5, 5, [
    83, 12, 50, 93, 99,
    79, 14, 15, 79, 1,
    32, 68, 6, 59, 87,
    54, 50, 86, 82, 62,
    9, 19, 57,88, 99
  ]);
  $best_location = Optimizer::find_best_location($grid);
  printf("Best location: %s\n", $best_location[0]);
}

main();

