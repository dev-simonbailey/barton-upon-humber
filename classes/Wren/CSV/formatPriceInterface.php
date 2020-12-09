<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface formatPriceInterface {

	public function formatItemPrice( string $item ): string;

}
