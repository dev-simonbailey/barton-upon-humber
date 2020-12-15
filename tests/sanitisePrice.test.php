<?php
declare(strict_types = 1);

/**
 * sanitisePrice.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * sanitiseItemPrice Test
 * Passes in a string containing non numeric characters
 * PASS if the return bring back the numeric values including period (.)
 * @return string
 */
function sanitiseItemPrice(): string {
  $price_to_sanitise = '$4.33';
  $sanitisedPrice = new Wren\CSV\sanitisePrice;
  $result = $sanitisedPrice->sanitiseItemPrice( $price_to_sanitise );
  if($result == "4.33"){
    return "sanitiseItemPrice: Test Passed";
  } else {
    return "sanitiseItemPrice: Test Failed";
  }
}
