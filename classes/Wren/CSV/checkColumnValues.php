<?php

declare(strict_types = 1);

/**
 * checkColumnValues Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */

namespace Wren\CSV;

/**
 * checkColumnValues Class to process the values in the columns
 */
class checkColumnValues implements checkColumnValuesInterface {

  /**
   * @var boolean
   */
  private $isGood;

  /**
   * Reset $isGood property
   */
  function __construct() {
    $this->isGood = true;
  }

  /**
   * Reset $isGood property
   */
  function __destruct() {
    $this->isGood = true;
  }

  /**
   * Check if the columns data in the row is empty
   * @param  array $row
   * @param  int   $rowColumnCount
   * @param  int   $columnCount
   * @return bool
   */
  public function checkColumnData( array $row, int $rowColumnCount, int $columnCount ): bool {
    if( $rowColumnCount == $columnCount ) {
      for ( $i=0; $i <= $columnCount; $i++ ) {
        if( empty( $row[$i] ) ) {
          if( $i == ( $columnCount ) ) {
            $isGood = true;
          } else {
            $isGood = false;
            continue;
          }
        }
      }
      if( $isGood ){
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
