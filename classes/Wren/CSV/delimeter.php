<?php

declare(strict_types = 1);

namespace Wren\CSV;

class delimeter implements delimeterInterface {

  private $delim              = '';
  private $possibleDelimeters = [];

  function __construct( string $headerRow, array $delimetersToCheck ) {
    $this->possibleDelimeters = $delimetersToCheck;
    $this->delim  = $this->getFileDelimeter( $headerRow );
  }

  function __destruct() {
    $this->delim  = '';
    $this->possibleDelimeters = [];
  }

  public function getDelimeter(): string {
    return $this->delim;
  }

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
