<?php

declare(strict_types = 1);

/**
 * formatPrice Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * formatPrice Class to format the price into two decimal places
 */
class formatPrice implements formatPriceInterface {

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
   * Format the input item price to two decimal places
   * @param  string $item
   * @return string
   */
  public function formatItemPrice( string $item ): string {
    return number_format( ( float ) $item, 2, '.', '' );
  }

}
