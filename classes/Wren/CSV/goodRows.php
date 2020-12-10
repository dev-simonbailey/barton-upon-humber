<?php

declare(strict_types = 1);

/**
 * goodRows Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * goodRows Class to hold the rows that pass all tests and are ok to insert into DB
 */
class goodRows implements goodRowsInterface {

  /**
   * Array to hold the rows that are ok to insert into the DB
   * @var array
   */
  private $goodrows = [];

  /**
   * Reset the $goodrows property to avoid contamination
   */
  function __construct() {
    $this->goodrows = [];
  }

  /**
   * Reset the $goodrows property to avoid contamination
   */
  function __destruct() {
    $this->goodrows = [];
  }

  /**
   * Check to see if the row already exists, if not add to the $goodrows property
   * @param  array $row
   * @return bool
   */
  public function setGoodRows( array $row ): bool {
    $pos = array_search( $row, $this->goodrows );
    if( $pos === false ) {
      array_push( $this->goodrows, $row );
      return true;
    } else {
      return false;
    }
  }

  /**
   * Return the $goodrows property
   * @return array
   */
  public function getGoodRows(): array {
    return $this->goodrows;
  }

}
