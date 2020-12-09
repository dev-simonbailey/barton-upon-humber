<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface checkMaxPriceInterface {

	public function checkItemMaxPrice( string $item ): bool;

}
