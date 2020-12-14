<?php

USE Wren\CSV as test;

// NOTE formatItemPrice Test
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
