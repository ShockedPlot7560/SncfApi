<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Coord {
	private function __construct(
		public readonly string $lon,
		public readonly string $lat
	) {
	}

	public static function fromArray(array $data) : Coord {
		return new Coord(
			$data['lon'],
			$data['lat']
		);
	}
}
