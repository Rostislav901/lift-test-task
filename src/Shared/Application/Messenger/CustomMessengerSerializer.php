<?php

namespace App\Shared\Application\Messenger;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;
use Symfony\Component\Serializer\SerializerInterface as SymfonySerializerInterface;

class CustomMessengerSerializer implements SerializerInterface
{
    private SymfonySerializerInterface  $serializer;

    public function __construct(SymfonySerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function decode(array $encodedEnvelope): Envelope
    {
        $messageData = json_decode($encodedEnvelope['body'], true);
        $message = $this->serializer->deserialize(json_encode($messageData), $messageData['type'], 'json');

        return new Envelope($message);
    }

    public function encode(Envelope $envelope): array
    {
        $message = $envelope->getMessage();
        $messageData = $this->serializer->serialize($message, 'json');

        return [
            'body' => json_encode([
                'type' => get_class($message),
                'message' => json_decode($messageData, true),
            ]),
            'headers' => [
                'type' => get_class($message),
            ],
        ];
    }
}