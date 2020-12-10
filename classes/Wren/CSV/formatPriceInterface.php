<?php

declare(strict_types = 1);

/**
 * formatPriceInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * formatPriceInterface Interface for the formatPrice class
 */
interface formatPriceInterface {

	/**
	 * formatItemPrice Interface Declaration
	 * @param  string $item
	 * @return string
	 */
	public function formatItemPrice( string $item ): string;

}
