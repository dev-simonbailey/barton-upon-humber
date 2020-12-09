<?php

declare(strict_types = 1);

namespace Wren\CSV;

class testFlag implements testFlagInterface {

  private $test_status;

  public function __construct( bool $arg ) {
    $this->test_status = $arg;
  }

  public function __destruct() {
    $this->test_status = false;
  }

  public function getTestFlag(): bool {
    return $this->test_status;
  }

}
