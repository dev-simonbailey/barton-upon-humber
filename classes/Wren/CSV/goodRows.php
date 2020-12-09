<?php

declare(strict_types = 1);

namespace Wren\CSV;

class goodRows implements goodRowsInterface {

  private $goodrows = [];

  function __construct() {
    $this->goodrows = [];
  }

  function __destruct() {
    $this->goodrows = [];
  }

  public function setGoodRows( array $row ): bool {
    $pos = array_search( $row, $this->goodrows );
    if( $pos === false ) {
      array_push( $this->goodrows, $row );
      return true;
    } else {
      //unset($this->goodrows[$pos]);
      return false;
    }
  }

  public function getGoodRows(): array {
    return $this->goodrows;
  }

}
