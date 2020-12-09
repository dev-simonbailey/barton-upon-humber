<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface delimeterInterface {

	public function getDelimeter(): string;

	public function getFileDelimeter( string $headerRow ): string;

}
