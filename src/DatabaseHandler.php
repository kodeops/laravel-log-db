<?php

namespace Yoeriboven\LaravelLogDb;

use Monolog\Handler\AbstractProcessingHandler;
use Yoeriboven\LaravelLogDb\Models\HttpRequestLog;

class DatabaseHandler extends AbstractProcessingHandler
{
    /**
     * @inheritDoc
     */
    protected function write(array $record): void
    {
        HttpRequestLog::create([
            'level' => $record['level'],
            'level_name' => $record['level_name'],
            'message' => $record['message'],
            'logged_at' => $record['datetime'],
            'context' => $record['context'],
            'extra' => $record['extra'],
        ]);
    }
}
