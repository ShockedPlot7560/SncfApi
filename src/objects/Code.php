<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Code {
	private function __construct(
		public readonly Type $type,
		public readonly string $value
	) {
	}

	public static function fromArray(array $data) : Code {
		return new Code(
			Type::from($data['type']),
			$data['value']
		);
	}
}
