<?php

declare(strict_types = 1);

namespace Wren\CSV;

class checkMaxPrice implements checkMaxPriceInterface {

  CONST MAXPRICE = 1000;

  function __construct() {
  }

  function __destruct() {
  }

  public function checkItemMaxPrice( string $item ): bool {

    if(floatval($item) >= self::MAXPRICE){

      return true;

    } else {

      return false;

    }

  }

}
