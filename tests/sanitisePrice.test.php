<?php

USE Wren\CSV as test;

// NOTE sanitiseItemPrice Test
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
