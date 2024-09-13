<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Journey {
	/**
	 * @param string[] $tags
	 * @param Section[] $sections
	 * @param Link[] $links
	 */
	private function __construct(
		public readonly float $duration,
		public readonly float $nbTransfers,
		public readonly string $departureDateTime,
		public readonly string $arrivalDateTime,
		public readonly string $requestedDateTime,
		public readonly string $type,
		public readonly string $status,
		public readonly array $tags,
		public readonly Co2Emission $co2Emission,
		public readonly AirPolluants $airPolluants,
		public readonly Distances $durations,
		public readonly Distances $distances,
		public readonly Fare $fare,
		public readonly array $sections,
		public readonly array $links
	) {
	}

	public static function fromArray(array $data) : self {
		$tags = array_map(fn (string $tag) => $tag, $data['tags']);
		$sections = array_map(fn (array $section) => SectionBuilder::from($section), $data['sections']);
		$sections = array_filter($sections, fn (?Section $sec) => $sec !== null);
		$links = array_map(fn (array $link) => Link::fromArray($link), $data['links']);

		return new self(
			$data['duration'],
			$data['nb_transfers'],
			$data['departure_date_time'],
			$data['arrival_date_time'],
			$data['requested_date_time'],
			$data['type'],
			$data['status'],
			$tags,
			Co2Emission::fromArray($data['co2_emission']),
			AirPolluants::fromArray($data['air_pollutants']),
			Distances::fromArray($data['durations']),
			Distances::fromArray($data['distances']),
			Fare::fromArray($data['fare']),
			$sections,
			$links
		);
	}
}
