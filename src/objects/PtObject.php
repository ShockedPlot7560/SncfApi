<?php

namespace ShockedPlot7560\SncfApi\objects;

final class PtObject {
	private function __construct(
		public readonly string $id,
		public readonly string $name,
		public readonly float $quality,
		public readonly string $embeddedType,
		public readonly Trip $trip,
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['id'],
			$data['name'],
			$data['quality'],
			$data['embedded_type'],
			Trip::fromArray($data['trip'])
		);
	}
}
