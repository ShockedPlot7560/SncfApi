<?php

namespace ShockedPlot7560\SncfApi\objects;

final class SectionLink {
	private function __construct(
		public readonly string $type,
		public readonly string $id
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['type'],
			$data['id']
		);
	}
}
