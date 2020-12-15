<?php

USE Wren\CSV as test;

// NOTE checkItemMaxPrice Test
function checkItemMaxPrice(): string {
  $itemValue = "1000.01";
  $thisRowMaxPriceCheck = new test\checkMaxPrice;
  $result = $thisRowMaxPriceCheck->checkItemMaxPrice( $itemValue );
  if( $result ){
    return "checkItemMaxPrice: Test Passed";
  } else {
    return "checkItemMaxPrice: Test Failed";
  }
}
