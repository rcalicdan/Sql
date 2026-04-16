<?php

declare(strict_types=1);

namespace Hibla\Sql;

use Hibla\Promise\Interfaces\PromiseInterface;

/**
 * Defines the capability to execute a prepared statement as an unbuffered stream.
 */
interface StreamingStatementInterface
{
    /**
     * Executes the prepared statement returning an unbuffered stream.
     *
     * @param array<int, mixed> $params The parameters to bind to the statement.
     * @return PromiseInterface<RowStream>
     */
    public function executeStream(array $params = []): PromiseInterface;
}