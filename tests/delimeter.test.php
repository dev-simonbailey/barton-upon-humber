<?php

USE Wren\CSV as test;

// NOTE getFileDelimeter Test
function getFileDelimeter(): string {
  $headerString = 'item1,item2,item3,item4,item5,item6';
  $delimeterArray = array (',');
  $csvDelimeter = new test\delimeter( $headerString, $delimeterArray );
  $headerRow = $headerString;
  $result = $csvDelimeter->getFileDelimeter( $headerRow );
  if($result == ","){
    return "getFileDelimeter: Test Passed";
  } else {
    return "getFileDelimeter: Test Failed";
  }
}

// NOTE getDelimeter Test
function getDelimeter(): string {
  $headerString = 'item1,item2,item3,item4,item5,item6';
  $delimeterArray = array (',');
  $csvDelimeter = new test\delimeter( $headerString, $delimeterArray );
  $result = $csvDelimeter->getDelimeter();
  if($result == ","){
    return "getDelimeter: Test Passed";
  } else {
    return "getDelimeter: Test Failed";
  }
}
