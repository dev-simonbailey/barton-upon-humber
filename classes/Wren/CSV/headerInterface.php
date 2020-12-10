<?php

declare(strict_types = 1);

/**
 * headerInterface
 * @author Simon Bailey <webdisk@hotmail.com>
 * @package Wren\CSV
 */
namespace Wren\CSV;

/**
 * headerInterface Interface for the header class
 */
interface headerInterface {

	/**
	 * getHeader Interface Declaration
	 * @return string
	 */
	public function getHeader(): string;

}
