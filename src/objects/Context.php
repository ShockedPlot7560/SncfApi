<?php

namespace ShockedPlot7560\SncfApi\objects;

final class Context
{
    private function __construct(
        public readonly CarDirectPath $carDirectPath,
        public readonly string $currentDatetime,
        public readonly string $timeZone
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            CarDirectPath::fromArray($data['car_direct_path']),
            $data['current_datetime'],
            $data['timezone']
        );
    }
}