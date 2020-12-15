<?php

USE Wren\CSV as test;

// NOTE checkColumnData Test
function checkColumnData(): string {
  $csv = array('item1','item2','item3','item4','item5','item6');
  $rowColumnCount = count($csv);
  $columnCount = 6;
  $thisRowColumnCheck = new test\checkColumnValues();
  $result = $thisRowColumnCheck->checkColumnData( $csv, $rowColumnCount, $columnCount );
  if( $result ) {
    return "checkColumnData: Test Passed";
  } else {
    return "checkColumnData: Test Failed";
  }
}
