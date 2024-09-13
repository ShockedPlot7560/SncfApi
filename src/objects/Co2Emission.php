<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Co2Emission {
	private function __construct(
		public readonly float $value,
		public readonly string $unit
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['value'],
			$data['unit']
		);
	}
}
