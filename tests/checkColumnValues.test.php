<?php
declare(strict_types = 1);

/**
 * checkColumnValues.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * checkColumnData Test
 * Passes in an array, an array count and a column count
 * PASS if  the column count equal the array count.
 * @return string
 */
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
