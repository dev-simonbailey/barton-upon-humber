<?php

declare(strict_types = 1);

namespace Wren\CSV;

class rowColumnCount implements rowColumnCountInterface {

  private $rowColCount = '';

  function __construct( array $rowColumns, string $delimeter ) {
    $this->rowColCount = count($rowColumns);
  }

  function __destruct() {
    $this->rowColCount  = '';
  }

  public function getrowColumnCount(): int {
    return $this->rowColCount;
  }

}
