<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Place {
	private function __construct(
		public readonly string $id,
		public readonly string $name,
		public readonly float $quality,
		public readonly ?AdministrativeRegion $administrativeRegion,
		public readonly EmbeddedType $embeddedType,
		public readonly ?StopArea $stopArea = null
	) {
	}

	public static function fromArray(array $data) : Place {
		return new Place(
			$data['id'],
			$data['name'],
			$data['quality'],
			isset($data['administrative_region']) ? AdministrativeRegion::fromArray($data['administrative_region']) : null,
			EmbeddedType::from($data['embedded_type']),
			isset($data['stop_area']) ? StopArea::fromArray($data['stop_area']) : null
		);
	}
}
