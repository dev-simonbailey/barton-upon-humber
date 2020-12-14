<?php

USE Wren\CSV as test;

// NOTE checkItemMaxPrice Test
function checkItemMaxPrice(int $itemValue): string {
  $thisRowMaxPriceCheck = new test\checkMaxPrice;
  $result = $thisRowMaxPriceCheck->checkItemMaxPrice( $itemValue );
  if( $isMaxPrice ){
    return "checkItemMaxPrice: Test Passed";
  } else {
    return "checkItemMaxPrice: Test Failed";
  }
}
