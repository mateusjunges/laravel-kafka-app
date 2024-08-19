<?php declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;

final class Producer extends Command
{
    /** @var string */
    protected $signature = 'produce';

    /** @var string */
    protected $description = 'Produces a new message to Kafka.';

    public function handle(): int
    {
        Kafka::publish('kafka:9092')
            ->onTopic('my_messages')
            ->withBodyKey('foo', 'bar')
            ->withBodyKey('source', 'http request')
            ->send();

        return Command::SUCCESS;
    }
}
