<?php
declare(strict_types = 1);

/**
 * testFlag.test
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Test
 */

USE Wren\CSV as test;

/**
 * testFlag Test
 * Passes in a boolean value
 * PASS if return is equal
 * @return string
 */
function testFlag(): string {
  $state = true;
  $isTest = new test\testFlag( true );
  if( $isTest->getTestFlag() ) {
    return "testFlag: Test Passed";
  } else {
    return "testFlag: Test Failed";
  }
}
