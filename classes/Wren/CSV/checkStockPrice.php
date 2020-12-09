<?php

declare(strict_types = 1);

namespace Wren\CSV;

class checkStockPrice implements checkStockPriceInterface {

  CONST MINSTOCK = 10;
  CONST MINPRICE = 5;

  function __construct() {
  }

  function __destruct() {
  }

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
