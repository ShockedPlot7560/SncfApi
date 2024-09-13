<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Total {
	private function __construct(
		public readonly string $value
	) {
	}

	public static function fromArray(array $data) : self {
		return new self(
			$data['value']
		);
	}
}
