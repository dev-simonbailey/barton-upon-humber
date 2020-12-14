<?php

declare(strict_types = 1);

/**
 * Index
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */

// NOTE: Get the class autoloader
require(__DIR__."/req/autoloader.php");

// NOTE: Get the Meekro DB Class
require(__DIR__."/req/DB.class.php");

// NOTE: Get the DB credentials
require(__DIR__."/req/cred.php");

//NOTE: Create DB Object
$DB = new MeekroDB($host, $user, $password, $dbName, $port, $encoding);

// NOTE: Echo the start of the process
echo date( "Y-m-d H:i:s" )." ==> START OF PROCESS\n";

// NOTE: Get arguement 1, if set and test to see if it's a value we allow
if( isset( $argv[1] ) && $argv[1] === "test" ) {

  // NOTE: Create a $isTest object and populate it with true
  $isTest = new Wren\CSV\testFlag(true);

} else {

  // NOTE: Create a $isTest object and populate it with false
  $isTest = new Wren\CSV\testFlag(false);

}

// NOTE: Set the csv filepath
$csvFilePath  = __DIR__.'/csv/';

// NOTE: Set the csv filename
$csvFileName  = "stock.csv";

// NOTE: Set delimeter array
$delimeterArray = array (',',';','|','  ');

// NOTE: Create a $headerString object and get the header row
$headerString = new Wren\CSV\header( $csvFilePath.$csvFileName );

// NOTE: Create a $csvDelimeter object and get the delimeter form the header row
$csvDelimeter = new Wren\CSV\delimeter( $headerString->getHeader(),$delimeterArray );

// NOTE: Populate the header array
$headerString->setHeaderArray( $csvDelimeter->getDelimeter() );

// NOTE: Create a $columnCount object to get the column count
$columnCount = new Wren\CSV\columnCount( $csvDelimeter->getDelimeter(), $headerString->getHeader() );

// NOTE: Create a $good_rows object for use later
$good_rows = new Wren\CSV\goodRows;

// NOTE: Create a $bad_rows object for use later
$bad_rows = new Wren\CSV\badRows;

// NOTE: Create a $sanitisedPrice object for use later
$sanitisedPrice = new Wren\CSV\sanitisePrice;

// NOTE: Create a $formattedPrice object for use later
$formattedPrice = new Wren\CSV\formatPrice;

// NOTE: Open the csv file
$csvFile = @fopen( $csvFilePath.$csvFileName, "r" );

// NOTE: Get the first row, but ignore it, as we have process this row in the $headerString object
$DO_NOTHING = fgetcsv( $csvFile );

// NOTE: Loop through the csv file line by line
while ( ( $csv = fgetcsv( $csvFile, 0, $csvDelimeter->getDelimeter() ) ) !== false ) {

  // NOTE: Create a $thisRowColumnCount object for this rows column count for use later
  $thisRowColumnCount = new Wren\CSV\rowColumnCount( $csv,$csvDelimeter->getDelimeter() );

  // NOTE: Create a $thisRowColumnCheck object for this checking this rows column values
  $thisRowColumnCheck = new Wren\CSV\checkColumnValues();

  // NOTE: Create a $thisRowMaxPriceCheck object for use later
  $thisRowMaxPriceCheck = new Wren\CSV\checkMaxPrice;

  // NOTE: Create a $thisRowMinStockPriceCheck object for use later
  $thisRowMinStockPriceCheck = new Wren\CSV\checkStockPrice;

  // NOTE: if an empty column is found, that is the last column,
  // then put the row into the good rows object,
  // otherwise put it in the badrows object
  if($thisRowColumnCheck->checkColumnData( $csv, $thisRowColumnCount->getrowColumnCount(), $columnCount->getcolumnCount() ) ) {

    // NOTE: Sanitise the price - remove anything that is not a numeric value or a period (.)
    $csv[4] = $sanitisedPrice->sanitiseItemPrice( $csv[4] );

    // NOTE: Format the price to 2 decimal places
    $csv[4] = $formattedPrice->formatItemPrice( $csv[4] );

    // NOTE: Check if the price exceeds the max threshold, specified in the object
    $isMaxPrice = $thisRowMaxPriceCheck->checkItemMaxPrice( $csv[4] );

    if( !$isMaxPrice ) {

      // NOTE: So the item price is below the max threshold.
      $StockPrice = $thisRowMinStockPriceCheck->checkItemStockPrice( $csv[3], $csv[4]);

      if($StockPrice){

        // NOTE: The stock and price are above the min threshold, specified in the object
        $addToGoodRows = $good_rows->setGoodRows( $csv );

        if(!$addToGoodRows){
          // NOTE: a false return indicates that this row already exist in the $good_rows object

          // NOTE: Add a field to the row with the error
          $csv[6] = "[ DUPLICATE RECORD ]";

          // NOTE: Pass the row to the $bad_rows object
          $bad_rows->setBadRows( $csv );

        }

      } else {
        // NOTE: The stock and price are below the min threshold, specified in the object

        // NOTE: Add a field to the row with the error
        $csv[6] = "[ STOCK AND / OR PRICE ARE NOT WITHIN BOUNDS ]";

        // NOTE: Pass the row to the $bad_rows object
        $bad_rows->setBadRows( $csv );

      }

    } else {
      // NOTE: The item price exceeds the max threshold

      // NOTE: Add a field to the row with the error
      $csv[6] = "[ ITEM PRICE EXCEEDS UPPER BOUNDS ]";

      // NOTE: Pass the row to the $bad_rows object
      $bad_rows->setBadRows( $csv );
    }

  } else {
    // NOTE: The column count does not match the header row column count, add row to badrows

    // NOTE: Add a field to the row with the error
    $csv[6] = "[ THE ROW COLUMN COUNT DOES NOT MATCH THE HEADER ROW COLUMN COUNT ]";

    // NOTE: Pass the row to the $bad_rows object
    $bad_rows->setBadRows( $csv );
  }

}

// NOTE: Truncate the table
$DB->query( "TRUNCATE wrenTest.tblProductData" );

// NOTE: Go through the $good_rows object and either store and echo or just echo if in test
foreach ( $good_rows->getGoodRows() as $row) {

  // NOTE: if the value of Discontinued column is YES, then add the datetime into the table
  if( strtoupper( $row['5'] ) == "YES" ) {
    $dtmDiscontinued = date( "Y-m-d H:i:s" );
  } else {
    $dtmDiscontinued = null;
  }
  // NOTE: if $isTest is false, then add the $row to the DB
  if( !$isTest->getTestFlag() ) {
    $DB->insert( 'wrenTest.tblProductData', [
      'strProductName'    => $row[1],
      'strProductDesc'    => $row[2],
      'strProductCode'    => $row[0],
      'intStockValue'     => $row[3],
      'decProductPrice'   => $row[4],
      'dtmDiscontinued'   => $dtmDiscontinued
    ] );

    // NOTE: Echo that we are inserting the row with the mentioned Product Code into the DB
    echo date( "Y-m-d H:i:s" )." ==> PROCESSING ==> ".$row[0]." INTO DATABASE\n";

  } else {

  // NOTE: Echo that we are test processing the row with the mentioned Product Code
  echo date( "Y-m-d H:i:s" )." ==> TEST PROCESSING ==> ".$row[0]." INTO DATABASE\n";
  }
}

// NOTE: got through the $bad_rows object and echo out the bad rows
foreach ( $bad_rows->getBadRows() as $row) {

  // NOTE: get the error from the row
  $error = $row[6];

  // NOTE: remove the error from the row, to return the data back to original
  array_pop($row);

  // NOTE: Echo out the Error and bad row
  echo date( "Y-m-d H:i:s" )." ERROR ==> ".$error." ==> ".implode( ",", $row )."\n";
}

// NOTE: Echo the process end
echo date( "Y-m-d H:i:s" )." ==> END OF PROCESS\n";
