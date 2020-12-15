<?php
declare(strict_types = 1);

/**
 * formatPrice.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * formatItemPrice Test
 * Passes in a zero place value
 * PASS if a 2 decimal place value is returned
 * @return string
 */
function formatItemPrice(): string {
  $price_to_be_formatted = "4";
  $formattedPrice = new test\formatPrice;
  $result = $formattedPrice->formatItemPrice( $price_to_be_formatted );
  if($result == "4.00"){
    return "formatItemPrice: Test Passed";
  } else {
    return "formatItemPrice: Test Failed";
  }
}
