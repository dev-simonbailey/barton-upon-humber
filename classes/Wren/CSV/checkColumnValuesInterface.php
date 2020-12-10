<?php

declare(strict_types = 1);

/**
 * checkColumnValuesInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * checkColumnValuesInterface Interface for the checkColumnValues class
 */
interface checkColumnValuesInterface {

	/**
	 * checkColumnData Interface Declaration
	 * @param  array $row
	 * @param  int   $rowColumnCount
	 * @param  int   $columnCount
	 * @return bool
	 */
	public function checkColumnData( array $row, int $rowColumnCount, int $columnCount ): bool;

}
