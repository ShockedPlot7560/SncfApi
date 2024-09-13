<?php

namespace ShockedPlot7560\SncfApi\objects;

final class GeoJson
{
    /**
     * @param float[][] $coordinates
     * @param Property[] $properties
     */
    private function __construct(
        public readonly string $type,
        public readonly array $coordinates,
        public readonly array $properties
    ){}

    public static function fromArray(array $data): self
    {
        $coordinates = $data['coordinates'] ?? [];
        $properties = array_map(fn(array $property) => Property::fromArray($property), $data['properties']);
        return new self(
            $data['type'],
            $coordinates,
            $properties
        );
    }
}