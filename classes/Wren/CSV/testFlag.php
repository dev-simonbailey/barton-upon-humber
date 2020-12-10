<?php

declare(strict_types = 1);

/**
 * testFlag Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * testFlag Class to hold the test flag status passed in via argv[1]
 */
class testFlag implements testFlagInterface {

  /**
   * If in test mode, hold true, otherwise hold false.
   * @var boolean
   */
  private $test_status;

  /**
   * set the $test_status property using the supplied $arg param
   * @param bool $arg
   */
  public function __construct( bool $arg ) {
    $this->test_status = $arg;
  }

  /**
   * Reset the $test_status property to avoid contamination
   */
  public function __destruct() {
    $this->test_status = false;
  }

  /**
   * return the $test_status property
   * @return bool
   */
  public function getTestFlag(): bool {
    return $this->test_status;
  }

}
