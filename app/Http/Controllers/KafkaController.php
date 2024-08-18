<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Junges\Kafka\Facades\Kafka;

final class KafkaController
{
    public function __invoke(): JsonResponse
    {
        Kafka::publish('localhost:9092')
            ->onTopic('my_messages')
            ->withBodyKey('foo', 'bar')
            ->withBodyKey('source', 'http request')
            ->send();

        return response()->json('ok');
    }
}
