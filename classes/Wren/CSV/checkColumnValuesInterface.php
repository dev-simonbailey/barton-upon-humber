<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface checkColumnValuesInterface {

	public function checkColumnData( array $row, int $rowColumnCount, int $columnCount ): bool;

}
