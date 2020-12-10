<?php

declare(strict_types = 1);

/**
 * rowColumnCount Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * rowColumnCount Class to get the number of columns for the row
 */
class rowColumnCount implements rowColumnCountInterface {

  /**
   * Column count of row
   * @var integer
   */
  private $rowColCount = 0;

  /**
   * Get the column count from the row passed in, using the delimeter passed in
   * @param array  $rowColumns
   * @param string $delimeter
   */
  function __construct( array $rowColumns, string $delimeter ) {
    $this->rowColCount = count($rowColumns);
  }

  /**
   * Reset the $rowColCount property to avoid contamination
   */
  function __destruct() {
    $this->rowColCount  = 0;
  }

  /**
   * Return the $rowColCount property
   * @return int
   */
  public function getrowColumnCount(): int {
    return $this->rowColCount;
  }

}
