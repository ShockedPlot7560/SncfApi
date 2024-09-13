<?php

namespace ShockedPlot7560\SncfApi\objects;

final class CarDirectPath
{
    private function __construct(
        public readonly Co2Emission $co2Emission,
        public readonly AirPolluants $airPolluants,
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            Co2Emission::fromArray($data['co2_emission']),
            AirPolluants::fromArray($data['air_pollutants'])
        );
    }
}