<?php

declare(strict_types = 1);

/**
 * checkMaxPriceInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * checkMaxPriceInterface Interface for the checkMaxPrice class
 */
interface checkMaxPriceInterface {

	/**
	 * checkItemMaxPrice Interface Declaration
	 * @param array $row
	 * @return void
	 */
	public function checkItemMaxPrice( string $item ): bool;

}
