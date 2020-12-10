<?php

declare(strict_types = 1);

/**
 * header Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * header Class to get the header row from the selected file and explode the columns
 */
class header implements headerInterface {

  /**
   * Header string from file
   * @var string
   */
  private $header = '';

  /**
   * Header Array to hold the column headers
   * @var array
   */
  private $headerArray = [];

  /**
   * Open the files and get the first row
   * @param string $fullFilePath
   */
  function __construct( string $fullFilePath ) {
    $handle = @fopen( $fullFilePath, "r" );
    if( $handle ) {
      $this->header = fgets( $handle );
    }

  }

  /**
   * Reset the $header and $headerArray proporties to avoid contamination
   */
  function __destruct() {
    $this->header  = '';
    $this->headerArray = [];
  }

  /**
   * Return the $header property
   * @return string
   */
  public function getHeader(): string {
    return $this->header;
  }

  /**
   * Set the $headerArray property using the delimeter passed in
   * @param string $delimeter
   */
  public function setHeaderArray( string $delimeter ): void {
    $this->headerArray = explode( $delimeter, $this->header );
  }

  /**
   * Return the $headerArray property item via the index
   * @param  int    $index
   * @return string
   */
  public function getHeaderArrayItem( int $index ): string {
    return $this->headerArray[$index];
  }

}
