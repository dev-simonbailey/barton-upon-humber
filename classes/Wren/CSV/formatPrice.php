<?php

declare(strict_types = 1);

namespace Wren\CSV;

class formatPrice implements formatPriceInterface {

  function __construct() {
  }

  function __destruct() {
  }

  public function formatItemPrice( string $item ): string {

    // god knows
    //

    return number_format( ( float ) $item, 2, '.', '' );

  }

}
