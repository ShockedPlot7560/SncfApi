<?php

namespace ShockedPlot7560\SncfApi\objects;

final class From
{
    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly float $quality,
        public readonly ?Terminus $stopArea,
        public readonly string $embeddedType,
        public readonly ?StopPoint $stopPoint
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['quality'],
            isset($data['stop_area']) ? Terminus::fromArray($data['stop_area']) : null,
            $data['embedded_type'],
            isset($data['stop_point']) ? StopPoint::fromArray($data['stop_point']) : null
        );
    }
}