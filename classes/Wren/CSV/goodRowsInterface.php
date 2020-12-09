<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface goodRowsInterface {

	public function setGoodRows( array $row ): bool ;

	public function getGoodRows(): array;

}
