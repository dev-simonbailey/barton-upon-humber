<?php

declare(strict_types = 1);

/**
 * delimeter Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * delimeter Class to get the delimeter in use, using the header row as reference
 */
class delimeter implements delimeterInterface {

  /**
   * Delimeter
   * @var string
   */
  private $delim  = '';

  /**
   * The possible delimeters to test for
   * @var array
   */
  private $possibleDelimeters = [];

  /**
   * Populate the possibleDelimeters array and get the delimeter in use
   * @param string $headerRow         [description]
   * @param array  $delimetersToCheck [description]
   */
  function __construct( string $headerRow, array $delimetersToCheck ) {
    $this->possibleDelimeters = $delimetersToCheck;
    $this->delim  = $this->getFileDelimeter( $headerRow );
  }

  /**
   * Reset the $possibleDelimeters array and $delim property to avoid contamination
   */
  function __destruct() {
    $this->delim  = '';
    $this->possibleDelimeters = [];
  }

  /**
   * Return the delimeter found
   * @return string
   */
  public function getDelimeter(): string {
    return $this->delim;
  }

  /**
   * search through the header row looking for the occurances of each delimeter and return the highest ranked one
   * @param  string $headerRow
   * @return string
   */
  public function getFileDelimeter( string $headerRow ): string {
    $csv_delimeter  = '';
    $delim_array    = [];
    $dc     = 0;
    foreach ( $this->possibleDelimeters as $delimeter ) {
      $delim_array[$delimeter] = substr_count( $headerRow, $delimeter );
    }
    foreach ( $delim_array as $key => $value ) {
      if( $value > $dc ) {
        $dc = $value;
        $csv_delimeter = $key;
      }
    }
    return $csv_delimeter;
  }

}
