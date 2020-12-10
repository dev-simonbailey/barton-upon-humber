<?php

declare(strict_types = 1);

/**
 * goodRowsInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * goodRowsInterface Interface for the goodRows class
 */
interface goodRowsInterface {

	/**
	 * setGoodRows Interface Declaration
	 * @param  array $row
	 * @return bool
	 */
	public function setGoodRows( array $row ): bool ;

	/**
	 * getGoodRows Interface Declaration
	 * @return array
	 */
	public function getGoodRows(): array;

}
