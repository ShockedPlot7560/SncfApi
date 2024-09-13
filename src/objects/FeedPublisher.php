<?php

namespace ShockedPlot7560\SncfApi\objects;

final class FeedPublisher
{
    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $url,
        public readonly ?string $licence
    ){}

    public static function fromArray(array $data): FeedPublisher {
        return new FeedPublisher(
            $data['id'],
            $data['name'],
            $data['url'],
            $data['licence'] ?? null
        );
    }
}