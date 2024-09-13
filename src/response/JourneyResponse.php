<?php

namespace ShockedPlot7560\SncfApi\response;

use ShockedPlot7560\SncfApi\objects\Context;
use ShockedPlot7560\SncfApi\objects\Disruption;
use ShockedPlot7560\SncfApi\objects\FeedPublisher;
use ShockedPlot7560\SncfApi\objects\Journey;
use ShockedPlot7560\SncfApi\objects\Link;
use ShockedPlot7560\SncfApi\objects\Terminus;

final class JourneyResponse
{
    /**
     * @param FeedPublisher[] $feedPublishers
     * @param Link[] $links
     * @param Journey[] $journeys
     * @param mixed[] $tickets
     * @param Disruption[] $disruptions
     * @param Terminus[] $terminus
     * @param Context $context
     * @param mixed[] $notes
     * @param mixed[] $exceptions
     */
    private function __construct(
        public readonly array $feedPublishers,
        public readonly array $links,
        public readonly array $journeys,
        public readonly array $tickets,
        public readonly array $disruptions,
        public readonly array $terminus,
        public readonly Context $context,
        public readonly array $notes,
        public readonly array $exceptions
    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            array_map(fn(array $feedPublisher) => FeedPublisher::fromArray($feedPublisher), $data['feed_publishers'] ?? []),
            array_map(fn(array $link) => Link::fromArray($link), $data['links'] ?? []),
            array_map(fn(array $journey) => Journey::fromArray($journey), $data['journeys'] ?? []),
            $data['tickets'] ?? [],
            array_map(fn(array $disruption) => Disruption::fromArray($disruption), $data['disruptions'] ?? []),
            array_map(fn(array $terminus) => Terminus::fromArray($terminus), $data['terminus'] ?? []),
            Context::fromArray($data['context']),
            $data['notes'] ?? [],
            $data['exceptions'] ?? []
        );
    }
}