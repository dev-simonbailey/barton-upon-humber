<?php

declare(strict_types = 1);

namespace Wren\CSV;

class header implements headerInterface {

  private $header = '';

  private $headerArray = [];

  function __construct( string $fullFilePath ) {
    $handle = @fopen( $fullFilePath, "r" );
    if( $handle ) {
      $this->header = fgets( $handle );
    }

  }

  function __destruct() {
    $this->header  = '';
  }

  public function getHeader():string {
    return $this->header;
  }

  public function setHeaderArray( string $delimeter ): void {
    $this->headerArray = explode( $delimeter, $this->header );
  }

  public function getHeaderArrayItem( int $index ): string {
    return $this->headerArray[$index];
  }

}
