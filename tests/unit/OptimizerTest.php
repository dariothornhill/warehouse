<?php

use PHPUnit\Framework\TestCase;

final class OptimizerTest extends TestCase
{
  function testOnlyPointIsBestLocation() {
    $grid = new \Dariothornhill\WarehouseLocation\Grid(1,1,[1]);
    $expected = ["(0,0)", 0];
    $actual = \Dariothornhill\WarehouseLocation\Optimizer::find_best_location($grid);
    $this->assertEquals( $expected, $actual);
  }
    /**
     * @dataProvider gridProvider
     */
    function testFindBestLocation($rows, $cols, $data, $expected) {
    $grid = new \Dariothornhill\WarehouseLocation\Grid($rows,$cols,$data);
    $actual = \Dariothornhill\WarehouseLocation\Optimizer::find_best_location($grid);
    $this->assertEquals( $expected, $actual);
  }

  function gridProvider() : array {
    return [
      [1,1,[0],["(0,0)", 0]],
      [2,2,[1,2,3,4], ["(1,1)",7]],
      [2,2,[4,2,3,1], ["(0,0)",7]],
      [2,2,[1,3,2,4], ["(1,1)",7]],
      [2,2,[4,3,2,1], ["(0,0)",7]]
    ];
  }
}
