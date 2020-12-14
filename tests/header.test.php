<?php

USE Wren\CSV as test;

function getHeader() {
  $csvFilePath  = __DIR__.'/csv/';
  $csvFileName  = "stock.csv";
  $headerString = new Wren\CSV\header( $csvFilePath.$csvFileName );
  $result = $headerString->getHeader();
  if($result = "Product Code,Product Name,Product Description,Stock,Cost in GBP,Discontinued"){
    return "getHeader: Test Passed";
  } else {
    return "getHeader: Test Failed";
  }
}


function getHeaderArrayItem(){
  $delimeter = ",";
  $csvFilePath  = __DIR__.'/csv/';
  $csvFileName  = "stock.csv";
  $headerString = new Wren\CSV\header( $csvFilePath.$csvFileName );
  $headerString->setHeaderArray( $delimeter );
  $result = $headerString->getHeaderArrayItem(0);
  if($result == 'Product Code'){
    return "getHeaderArrayItem: Test Passed";
  } else {
    return "getHeaderArrayItem: Test Failed";
  }
}
