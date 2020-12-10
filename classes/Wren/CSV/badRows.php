<?php

declare(strict_types = 1);

/**
 * badrows Class
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * badrows Class to process and hold the badrows
 */
class badRows implements badRowsInterface {

  /**
   * Array to hold the rows that did not pass the tests and are not to inserted into the DB
   * @var array
   */
  private $badrows = [];

  /**
   * Reset the $badrows property to avoid contamination
   */
  function __construct() {
    $this->badrows = [];
  }

  /**
   * Reset the $badrows property to avoid contamination
   */
  function __destruct() {
    $this->badrows  = [];
  }

  /**
   * Receive a row as a param and push it into the $badrows property
   * @param array $row
   * @return void
   */
  public function setBadRows( array $row ): void {
    array_push($this->badrows,$row);
  }

  /**
   * Return the $badrows property
   * @return array
   */
  public function getBadRows(): array {
    return $this->badrows;
  }

}
