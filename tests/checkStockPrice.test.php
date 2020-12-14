<?php

USE Wren\CSV as test;

// NOTE checkItemStockPrice Test
function checkItemStockPrice(): string {
  $min_stock_level = 10;
  $min_price_point = 5;
  $thisRowMinStockPriceCheck = new test\checkStockPrice;
  $result = $thisRowMinStockPriceCheck->checkItemStockPrice( $min_stock_level, $min_price_point);
  if( $result ){
    return "checkItemStockPrice: Test Passed";
  } else {
    return "checkItemStockPrice: Test Failed";
  }
}
