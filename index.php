<?php

declare(strict_types = 1);

require(__DIR__."/req/autoloader.php");

require(__DIR__."/req/DB.class.php");

require(__DIR__."/req/cred.php");

$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

echo date( "Y-m-d H:i:s" )." ==> START OF PROCESS\n";

// Get arguement 1, if set and test to see if it's a value we allow
if(isset($argv[1]) && $argv[1] === "test") {

  $isTest = new Wren\CSV\testFlag(true);

} else {

  $isTest = new Wren\CSV\testFlag(false);

}

// set csv filepath
$csvFilePath  = __DIR__.'/csv/';

// set csv filename
$csvFileName  = "stock.csv";

// set delimeter array
$delimeterArray = array (',',';','|','  ');

// GET THE HEADER ROW
$headerString = new Wren\CSV\header( $csvFilePath.$csvFileName );

// GET THE DELIM FROM THE HEADER ROW
$csvDelimeter = new Wren\CSV\delimeter( $headerString->getHeader(),$delimeterArray );

// POPULATE THE HEADER ARRAY
$headerString->setHeaderArray( $csvDelimeter->getDelimeter() );

// GET THE COLUMN COUNT
$columnCount = new Wren\CSV\columnCount( $csvDelimeter->getDelimeter(),$headerString->getHeader() );

// create a goodrows object
$good_rows = new Wren\CSV\goodRows;

// create a badrows object
$bad_rows = new Wren\CSV\badRows;

// create a sanitisePrice object
$sanitisedPrice = new Wren\CSV\sanitisePrice;

// create a formatPrice object
$formattedPrice = new Wren\CSV\formatPrice;

// open the csv file
$csvFile = @fopen( $csvFilePath.$csvFileName, "r" );

// get the first row, but ignore it
$DO_NOTHING = fgetcsv( $csvFile );

// loop through the csv file line by line
while ( ( $csv = fgetcsv( $csvFile, 0, $csvDelimeter->getDelimeter() ) ) !== false ) {

  // create an object for this rows column count
  $thisRowColumnCount = new Wren\CSV\rowColumnCount( $csv,$csvDelimeter->getDelimeter() );

  // create an object for this checking this rows column values
  $thisRowColumnCheck = new Wren\CSV\checkColumnValues();

  // create a checkMaxPrice object
  $thisRowMaxPriceCheck = new Wren\CSV\checkMaxPrice;

  // create a checkStock object
  $thisRowMinStockPriceCheck = new Wren\CSV\checkStockPrice;

  // if an empty column is found, that is the last column, then put the row into the good rows object,
  // otherwise put it in the badrows object
  if($thisRowColumnCheck->checkColumnData( $csv, $thisRowColumnCount->getrowColumnCount(), $columnCount->getcolumnCount() ) ) {

    // sanitise the price - remove anything that is not a numeric value or a period (.)
    $csv[4] = $sanitisedPrice->sanitiseItemPrice( $csv[4] );

    // format the price to 2 decimal places
    $csv[4] = $formattedPrice->formatItemPrice( $csv[4] );

    // check if the price exceeds the max threshold, specified in the object
    $isMaxPrice = $thisRowMaxPriceCheck->checkItemMaxPrice( $csv[4] );

    if( !$isMaxPrice ) {

      // so the item price is below the max threshold.
      $StockPrice = $thisRowMinStockPriceCheck->checkItemStockPrice( $csv[3], $csv[4]);

      if($StockPrice){

        // the stock and price are above the min threshold, specified in the object
        $addToGoodRows = $good_rows->setGoodRows( $csv );

        if(!$addToGoodRows){
          $csv[6] = "[ DUPLICATE RECORD ]";
          $bad_rows->setBadRows( $csv );

        }

      } else {

        // the stock and price are below the min threshold, specified in the object
        $csv[6] = "[ STOCK AND / OR PRICE ARE NOT WITHIN BOUNDS ]";
        $bad_rows->setBadRows( $csv );

      }

    } else {
      // the item price exceeds the max threshold
      $csv[6] = "[ ITEM PRICE EXCEEDS UPPER BOUNDS ]";
      $bad_rows->setBadRows( $csv );
    }

  } else {
    // the column count does not match the header row column count, add row to badrows
    $csv[6] = "[ THE ROW COLUMN COUNT DOES NOT MATCH THE HEADER ROW COLUMN COUNT ]";
    $bad_rows->setBadRows( $csv );
  }

}

$DB->query( "TRUNCATE wrenTest.tblProductData" );

// go through the good rows and either store and echo or just echo if in test
foreach ( $good_rows->getGoodRows() as $row) {
  // if the value of Discontinued column is YES, then add the datetime into the table
  if( strtoupper( $row['5'] ) == "YES" ) {
    $dtmDiscontinued = date( "Y-m-d H:i:s" );
  } else {
    $dtmDiscontinued = null;
  }
  if( !$isTest->getTestFlag() ) {
    $DB->insert( 'wrenTest.tblProductData', [
      'strProductName'    => $row[1],
      'strProductDesc'    => $row[2],
      'strProductCode'    => $row[0],
      'intStockValue'     => $row[3],
      'decProductPrice'   => $row[4],
      'dtmDiscontinued'   => $dtmDiscontinued
    ] );
    echo date( "Y-m-d H:i:s" )." ==> PROCESSING ==> ".$row[0]," INTO DATABASE\n";
  } else {
  echo date( "Y-m-d H:i:s" )." ==> TEST PROCESSING ==> ".$row[0]," INTO DATABASE\n";
  }
}

foreach ( $bad_rows->getBadRows() as $row) {
  $error = $row[6];
  array_pop($row);
  echo date( "Y-m-d H:i:s" )." ERROR ==> ".$error." ==> ".implode( ",", $row )."\n";
}

echo date( "Y-m-d H:i:s" )." ==> END OF PROCESS\n";
