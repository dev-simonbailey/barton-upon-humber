<?php

declare(strict_types = 1);

/**
 * rowColumnCountInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * rowColumnCountInterface Interface for the rowColumnCount class
 */
interface rowColumnCountInterface {

	/**
	 * getrowColumnCount Interface Declaration
	 * @return int
	 */
	public function getrowColumnCount(): int;

}
