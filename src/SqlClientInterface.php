<?php

declare(strict_types=1);

namespace Hibla\Sql;

use Hibla\Promise\Interfaces\PromiseInterface;

/**
 * Primary interface for SQL database clients.
 */
interface SqlClientInterface extends QueryInterface
{
    /**
     * Statistics about the connection pool.
     *
     * @var array<string, int|bool>
     */
    public array $stats { get; }

    /**
     * Begins a database transaction with automatic connection pool management.
     *
     * @return PromiseInterface<Transaction>
     */
    public function beginTransaction(?IsolationLevelInterface $isolationLevel = null): PromiseInterface;

    /**
     * Executes a callback within a database transaction with automatic
     * commit, rollback, and retry management.
     *
     * @template TResult
     * @param callable(Transaction): TResult $callback
     * @return PromiseInterface<TResult>
     */
    public function transaction(
        callable $callback,
        ?TransactionOptions $options = null,
    ): PromiseInterface;

    /**
     * Performs a health check on all idle connections in the pool.
     *
     * @return PromiseInterface<array<string, int>>
     */
    public function healthCheck(): PromiseInterface;

    /**
     * Clears the prepared statement cache for all connections.
     */
    public function clearStatementCache(): void;

    /**
     * Initiates a graceful shutdown of the client.
     *
     * Stops accepting new work immediately and returns a promise that resolves 
     * once all in-flight queries and transactions have completed.
     *
     * @return PromiseInterface<void>
     */
    public function closeAsync(float $timeout = 0.0): PromiseInterface;

    /**
     * Force-closes all connections and shuts down the pool immediately.
     */
    public function close(): void;
}