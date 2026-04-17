<?php

declare(strict_types=1);

namespace Hibla\Sql;

use Hibla\Promise\Interfaces\PromiseInterface;

/**
 * Defines the capability to execute SQL queries as unbuffered streams.
 */
interface StreamingQueryInterface
{
    /**
     * Streams a query row-by-row without buffering the entire result set in memory.
     *
     * @param string $sql SQL query to execute
     * @param array<int, mixed> $params Optional parameters
     * @param positive-int $bufferSize Number of rows to buffer internally per read. Defaults to 100.
     * @return PromiseInterface<RowStream>
     */
    public function stream(string $sql, array $params = [], int $bufferSize = 100): PromiseInterface;
}
