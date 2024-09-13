<?php

namespace ShockedPlot7560\SncfApi\objects;

final class ImpactedStop
{
    private function __construct(
        public readonly StopPoint $stopPoint,
        public readonly string $baseArivalTime,
        public readonly string $baseDepartureTime,
        public readonly string $amendedArrivalTime,
        public readonly string $amendedDepartureTime,
        public readonly string $cause,
        public readonly string $stopTimeEffect,
        public readonly string $departureStatus,
        public readonly string $arrivalStatus,
        public readonly bool $isDetour
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            StopPoint::fromArray($data['stop_point']),
            $data['base_arrival_time'],
            $data['base_departure_time'],
            $data['amended_arrival_time'],
            $data['amended_departure_time'],
            $data['cause'],
            $data['stop_time_effect'],
            $data['departure_status'],
            $data['arrival_status'],
            $data['is_detour']
        );
    }
}