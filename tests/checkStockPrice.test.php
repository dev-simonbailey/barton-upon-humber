<?php
declare(strict_types = 1);

/**
 * checkStockPrice.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * checkItemStockPrice Test
 * Passes in a min stock level and a min item price
 * PASS if the stock AND price are below the threshold.
 * @return string
 */cd //
function checkItemStockPrice(): string {
  $min_stock_level = "10";
  $min_price_point = "5";
  $thisRowMinStockPriceCheck = new test\checkStockPrice;
  $result = $thisRowMinStockPriceCheck->checkItemStockPrice( $min_stock_level, $min_price_point);
  if( !$result ){
    return "checkItemStockPrice: Test Passed";
  } else {
    return "checkItemStockPrice: Test Failed";
  }
}
