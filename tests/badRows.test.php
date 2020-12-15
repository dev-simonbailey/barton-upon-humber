<?php
declare(strict_types = 1);
declare(strict_types = 1);
/**
 * badRows.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * getBadRows Test
 * Passes in an array
 * Pass if the first item matches the first item in the array passed in.
 * @return string
 */
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
