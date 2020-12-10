<?php

declare(strict_types = 1);

/**
 * columnCount Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */

namespace Wren\CSV;

/**
 * columnCount Class to get the number of columns, using the header row as reference
 */
class columnCount implements columnCountInterface {

  /**
   * Column Count
   * @var integer
   */
  private $ColCount = 0;

  /**
   * Explode the header row using the supplied delimeter and get the column count
   * @param string $headerRow
   * @param string $delimeter
   */
  function __construct( string $headerRow, string $delimeter ) {
    $columns = explode( $headerRow, $delimeter );
    $this->ColCount = count( $columns );
  }

  /**
   * Reset the $ColCount property to avoid contamination
   */
  function __destruct() {
    $this->ColCount  = 0;
  }

  /**
   * Return the column count
   * @return int
   */
  public function getcolumnCount(): int {
    return $this->ColCount;
  }

}
