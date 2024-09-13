<?php

namespace ShockedPlot7560\SncfApi\objects;

final class AirPolluants {
	private function __construct(
		public readonly string $unit,
		public readonly Values $values
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['unit'],
			Values::fromArray($data['values'])
		);
	}
}
