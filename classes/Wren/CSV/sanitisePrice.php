<?php

declare(strict_types = 1);

namespace Wren\CSV;

class sanitisePrice implements sanitisePriceInterface {

  function __construct() {
  }

  function __destruct() {
  }

  public function sanitiseItemPrice( string $item ): string {

    return preg_replace('/[^0-9.]+/', '', $item);

  }

}
