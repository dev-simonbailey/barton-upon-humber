<?php

declare(strict_types = 1);

namespace Wren\CSV;

class checkColumnValues implements checkColumnValuesInterface {

  private $isGood;

  function __construct() {
    $this->isGood = true;
  }

  function __destruct() {
    $this->isGood = false;
  }

  public function checkColumnData( array $row, int $rowColumnCount, int $columnCount ): bool {
    if( $rowColumnCount == $columnCount ) {
      for ( $i=0; $i < $columnCount; $i++ ) {
        if( empty( $csv[$i] ) ) {
          if( $i == ( $columnCount-1 ) ) {
            $isGood = true;
          } else {
            $isGood = false;
            continue;
          }
        }
      }
      if( $isGood ){
        return true;
        //$good_rows->setGoodRows($csv);
      } else {
        return false;
        //$bad_rows->setBadRows($csv);
      }
    } else {
      return false;
      //$bad_rows->setBadRows($csv);
    }
  }
}
