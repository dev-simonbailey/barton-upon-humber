<?php

USE Wren\CSV as test;

// NOTE getrowColumnCount Test
function getrowColumnCount(): string {
  $csv = array('item1','item2','item3','item4','item5','item6');
  $csvDelimeter = ",";
  $thisRowColumnCount = new test\rowColumnCount( $csv, $csvDelimeter );
  $result = $thisRowColumnCount->getrowColumnCount();
  if($result == 6){
    return "getrowColumnCount: Test Passed";
  } else {
    return "getrowColumnCount: Test Failed";
  }
}
