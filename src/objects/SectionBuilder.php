<?php

namespace ShockedPlot7560\SncfApi\objects;

class SectionBuilder {
	public static function from(array $data) : ?Section {
		if (isset($data['type']) && $data['type'] !== "waiting") {
			return Section::fromArray($data);
		}

		return null;
	}
}
