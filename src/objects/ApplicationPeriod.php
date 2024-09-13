<?php

namespace ShockedPlot7560\SncfApi\objects;

final class ApplicationPeriod
{
    private function __construct(
        public readonly string $begin,
        public readonly string $end
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['begin'],
            $data['end']
        );
    }
}