<?php

declare(strict_types = 1);

/**
 * checkStockPriceInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * checkStockPriceInterface Interface for the checkStockPrice class
 */
interface checkStockPriceInterface {

	/**
	 * checkItemStockPrice Interface Declaration
	 * @param  string $stock
	 * @param  string $price
	 * @return bool
	 */
	public function checkItemStockPrice( string $stock, string $price ): bool;

}
