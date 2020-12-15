<?php
declare(strict_types = 1);

/**
 * rowColumnCount.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * getrowColumnCount Test
 * Passes in an array and delimeter
 * PASS if the column count equals 6
 * @return string
 */
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
