<?php

declare(strict_types = 1);

/**
 * badrowsInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * badRowsInterface Interface for the badRows class
 */
interface badRowsInterface {

	/**
	 * setBadRows Interface Declaration
	 * @param array $row
	 * @return void
	 */
	public function setBadRows( array $row ): void;

	/**
	 * getBadRows Interface Declaration
	 * @return array
	 */
	public function getBadRows(): array;

}
