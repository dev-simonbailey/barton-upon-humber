<?php

declare(strict_types = 1);

/**
 * sanitisePriceInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * sanitisePriceInterface Interface for the sanitisePrice class
 */
interface sanitisePriceInterface {

	/**
	 * sanitiseItemPrice Interface Declaration
	 * @param  string $item
	 * @return string
	 */
	public function sanitiseItemPrice( string $item ): string;

}
