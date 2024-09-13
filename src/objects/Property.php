<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Property {
	private function __construct(
		public readonly string $length
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['length']
		);
	}
}
