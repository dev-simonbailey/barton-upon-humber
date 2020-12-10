<?php

declare(strict_types = 1);

/**
 * checkMaxPrice Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */

namespace Wren\CSV;

/**
 * checkColumnValues Class to check the price value of the row
 */
class checkMaxPrice implements checkMaxPriceInterface {

  /**
   * Max Item Price Allowed
   * @var integer
   */
  CONST MAXPRICE = 1000;

  /**
   * Do Nothing
   */
  function __construct() {
  }

  /**
   * Do Nothing
   */
  function __destruct() {
  }

  /**
   * Check to see if the item price is greater than or equal
   * to the MAXPRICE constant
   * @param  string $item
   * @return bool
   */
  public function checkItemMaxPrice( string $item ): bool {
    if(floatval($item) >= self::MAXPRICE){
      return true;
    } else {
      return false;
    }
  }

}
