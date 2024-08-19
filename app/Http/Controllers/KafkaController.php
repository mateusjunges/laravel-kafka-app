<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

final class KafkaController
{
    public function __invoke(): JsonResponse
    {
        Kafka::publish('kafka:9092')
            ->onTopic('my_messages')
            ->withMessage((new Message(partition: -1)))
            ->send();

        return response()->json('ok');
    }
}
