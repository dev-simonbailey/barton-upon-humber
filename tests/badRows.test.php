<?php

USE Wren\CSV as test;

// NOTE getBadRows Test
function getBadRows(): string {
  $bad_rows = new test\badRows;
  $row = array('item1','item2','item3','item4','item5','item6');
  $bad_rows->setBadRows( $row );
  $result = $bad_rows->getBadRows();
  if( $result[0][0] == "item1" ){
    return "badRows: Test Passed";
  } else {
    return "badRows: Test Failed";
  }
}
