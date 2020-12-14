<?php

USE Wren\CSV as test;

// NOTE getGoodRows Test
function getGoodRows(): string {
  $good_rows = new test\goodRows;
  $row = array('item1','item2','item3','item4','item5','item6');
  $good_rows->setGoodRows( $row );
  $result = $good_rows->getGoodRows();
  if( $result[0][0] == "item1" ){
    return "getGoodRows: Test Passed";
  } else {
    return "getGoodRows: Test Failed";
  }
}
