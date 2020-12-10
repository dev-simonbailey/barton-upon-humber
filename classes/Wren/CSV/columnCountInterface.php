<?php

declare(strict_types = 1);

/**
 * columnCountInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * columnCountInterface Interface for the columnCount class
 */
interface columnCountInterface {

	/**
	 * getcolumnCount Interface Declaration
	 * @return int
	 */
	public function getcolumnCount(): int;

}
