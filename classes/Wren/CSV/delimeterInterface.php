<?php

declare(strict_types = 1);

/**
 * delimeterInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * delimeter Interface for the delimeter class
 */
interface delimeterInterface {

	/**
	 * getDelimeter Interface Declaration
	 * @return string
	 */
	public function getDelimeter(): string;

	/**
	 * getFileDelimeter Interface Declaration
	 * @param  string $headerRow
	 * @return string
	 */
	public function getFileDelimeter( string $headerRow ): string;

}
