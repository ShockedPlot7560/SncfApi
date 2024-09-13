<?php

namespace ShockedPlot7560\SncfApi\objects;

final class StopPoint {
	private function __construct(
		public readonly string $id,
		public readonly string $name,
		public readonly string $label,
		public readonly Coord $coord,
		public readonly array $links,
		public readonly array $equipments,
		public readonly array $administrativeRegions,
		public readonly ?Terminus $terminus,
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['id'],
			$data['name'],
			$data['label'],
			Coord::fromArray($data['coord']),
			$data['links'] ?? [],
			$data['equipments'] ?? [],
			array_map(fn ($administrativeRegion) => AdministrativeRegion::fromArray($administrativeRegion), $data['administrative_regions'] ?? []),
			isset($data['terminus']) ? Terminus::fromArray($data['terminus']) : null
		);
	}
}
