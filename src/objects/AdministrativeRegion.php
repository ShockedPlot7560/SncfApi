<?php

namespace ShockedPlot7560\SncfApi\objects;

final class AdministrativeRegion {
	private function __construct(
		public readonly string $id,
		public readonly string $name,
		public readonly float $level,
		public readonly string $zipCode,
		public readonly string $label,
		public readonly string $insee,
		public readonly Coord $coord
	) {
	}

	public static function fromArray(array $data) : AdministrativeRegion {
		return new AdministrativeRegion(
			$data['id'],
			$data['name'],
			$data['level'],
			$data['zip_code'],
			$data['label'],
			$data['insee'],
			Coord::fromArray($data['coord'])
		);
	}
}
