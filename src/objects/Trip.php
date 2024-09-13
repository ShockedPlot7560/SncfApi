<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Trip {
	private function __construct(
		public readonly string $id,
		public readonly string $name
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['id'],
			$data['name']
		);
	}
}
