<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface checkStockPriceInterface {

	public function checkItemStockPrice( string $stock, string $price ): bool;

}
