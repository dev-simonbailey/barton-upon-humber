<?php

declare(strict_types = 1);

namespace Wren\CSV;

interface sanitisePriceInterface {

	public function sanitiseItemPrice( string $item ): string;

}
