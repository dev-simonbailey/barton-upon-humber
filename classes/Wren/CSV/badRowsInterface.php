<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface badRowsInterface {

	public function setBadRows( array $row ): void;

	public function getBadRows(): array;

}
