<?php

declare(strict_types = 1);

namespace Wren\CSV;

class columnCount implements columnCountInterface {

  private $ColCount = '';

  function __construct( string $headerRow, string $delimeter ) {
    $columns = explode( $headerRow, $delimeter );
    $this->ColCount = count( $columns );
  }

  function __destruct() {
    $this->ColCount  = '';
  }

  public function getcolumnCount():int {
    return $this->ColCount;
  }

}
