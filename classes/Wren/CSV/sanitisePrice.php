<?php

declare(strict_types = 1);

/**
 * sanitisePrice Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * sanitisePrice Class to Sanitise the item price of any non-numeric cahracters, excluding periods (.)
 */
class sanitisePrice implements sanitisePriceInterface {

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
   * Replace and return all non -numeric characters, but leave periods (.)
   * @param  string $item
   * @return string
   */
  public function sanitiseItemPrice( string $item ): string {
    return preg_replace( '/[^0-9.]+/', '', $item );
  }

}
