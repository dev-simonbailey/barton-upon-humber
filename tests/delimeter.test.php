<?php
declare(strict_types = 1);

/**
 * delimeter.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * getFileDelimeter Test
 * Passes in a string and a delimeter array
 * PASS if the delimeter found matches the delimeter in the array
 * @return string
 */
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

/**
 * getDelimeter Test
 * Passes in a string and delimter and returns the delimeter
 * PASS if delimeters match
 * @return string
 */
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
