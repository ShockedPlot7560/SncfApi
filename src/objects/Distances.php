<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Distances {
	private function __construct(
		public readonly float $walking,
		public readonly float $bike,
		public readonly float $car,
		public readonly float $ridesharing,
		public readonly float $taxi,
		public readonly ?float $total
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['walking'],
			$data['bike'],
			$data['car'],
			$data['ridesharing'],
			$data['taxi'],
			$data['total'] ?? null
		);
	}
}
