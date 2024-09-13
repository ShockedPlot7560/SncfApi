<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Severity {
	private function __construct(
		public readonly string $name,
		public readonly string $effect,
		public readonly string $color,
		public readonly float $priority
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['name'],
			$data['effect'],
			$data['color'],
			$data['priority']
		);
	}
}
