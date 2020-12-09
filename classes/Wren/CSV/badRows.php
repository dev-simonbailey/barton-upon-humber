<?php

declare(strict_types = 1);

namespace Wren\CSV;

class badRows implements badRowsInterface {

  private $badrows = [];

  function __construct() {
    $this->badrows = [];
  }

  function __destruct() {
    $this->badrows  = [];
  }

  public function setBadRows( array $row ): void {
    array_push($this->badrows,$row);
  }

  public function getBadRows(): array {
    return $this->badrows;
  }

}
