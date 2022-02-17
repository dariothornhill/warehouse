<?php

use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
  function testGridBuild() {
    $grid = new \Dariothornhill\WarehouseLocation\Grid(1,1,[1]);
    $this->assertEquals(1, $grid->getWidth());
    $this->assertEquals(1, $grid->getHeight());
    $this->assertEquals(1, $grid->getValue(0,0));
  }
  
  function testAccessors() {
    $grid = new \Dariothornhill\WarehouseLocation\Grid(1,1,[1]);
    $this->assertEquals(1, $grid->getValue(0,0));
    $grid->setValue(0,0,2);
    $this->assertEquals(2, $grid->getValue(0,0));
  }
}
