<?php
declare(strict_types = 1);

/**
 * checkMaxPrice.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * checkItemMaxPrice Test
 * Passes in an Itemvalue
 * PASS if value passed in is greater than threshold.
 * @return string
 */
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
