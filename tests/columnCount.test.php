<?php
declare(strict_types = 1);

/**
 * columnCount.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * getcolumnCount Test
 * Passes in a string and delimeter that is exploded
 * PASS if the count is the same as the items in the string
 * @return string
 */
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
