<?php

USE Wren\CSV as test;

// NOTE: testFlag test
function testFlag(): string {
  $state = true
  $isTest = new test\testFlag( true );
  if( $isTest->getTestFlag() ) {
    return "testFlag: Test Passed";
  } else {
    return "testFlag: Test Failed";
  }
}
