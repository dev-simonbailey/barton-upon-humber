<?php

		declare(strict_types = 1);

		namespace Wren\csvValidation;

		interface attribute_optionsInterface {

			public function getColumns(): array;

			public function getSchema(): array;

			public function checkColumns(array $cols): string;

		}
