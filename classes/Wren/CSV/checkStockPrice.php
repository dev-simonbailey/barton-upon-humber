<?php

declare(strict_types = 1);

/**
 * checkStockPrice Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */

namespace Wren\CSV;

/**
 * checkStockPrice Class to check the stock min value and min price value of the row
 */
class checkStockPrice implements checkStockPriceInterface {

  /**
   * Min stock allowed
   * @var integer
   */
  CONST MINSTOCK = 10;

  /**
   * min price allowed
   * @var integer
   */
  CONST MINPRICE = 5;

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
   * Check if the item stock level is below the MINSTOCK constant AND the item price is below the MINPRICE constant
   * @param  string $stock
   * @param  string $price
   * @return bool
   */
  public function checkItemStockPrice( string $stock, string $price ): bool {
    if( $stock == "" ) {
      return false;
    }
    if( intval($stock) < self::MINSTOCK && $price < self::MINPRICE ){
      return false;
    } else {
      return true;
    }
  }

}
