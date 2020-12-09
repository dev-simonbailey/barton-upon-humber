<?php

declare(strict_types = 1);

namespace Wren\CSV;

//class validation implements validationInterface {

class validation {
  private $columns  = [];
  private $colCount = 0;
  private $delim    = '';

  function __construct(string $headerRow) {
    $this->delim    = $this->getFileDelimeter($headerRow);
    $this->columns  = str_split($this->delim,$headerRow);
    $this->colCount = count($this->columns);
  }

  function __destruct() {
    $this->columns = [];
    $this->colCount = 0;
  }

  public function getColumns():array {
    return $this->columns;
  }

  public function getColCount():int {
    return $this->colCount;
  }

  public function getDelim():string {
    return $this->delim;
  }

  private function getFileDelimeter(string $row):string {
    $totals = array_count_values(str_split($row,1));
    arsort( $totals );
    return array_keys( $totals )[0];
  }

}
