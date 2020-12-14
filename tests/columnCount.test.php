<?php

USE Wren\CSV as test;

// NOTE getcolumnCount Test
function getcolumnCount(): string {
  $csvDelimeter = ',';
  $headerString = 'item1,item2,item3,item4,item5,item6';
  $columnCount = new test\columnCount( $csvDelimeter, $headerString );
  $result = $columnCount->getcolumnCount();
  if($result == 6){
    return "getcolumnCount: Test Passed";
  } else {
    return "getcolumnCount: Test Failed";
  }
}
