<?php

declare(strict_types=1);

namespace Hibla\Sql;

/**
 * Interface for database query result objects.
 *
 * Provides a unified API for accessing results from all query types.
 *
 * @extends \IteratorAggregate<int, array<string, mixed>>
 */
interface Result extends \IteratorAggregate
{
    /**
     * The number of rows affected by INSERT/UPDATE/DELETE operations.
     */
    public int $affectedRows { get; }

    /**
     * The last inserted auto-increment ID.
     */
    public int $lastInsertId { get; }

    /**
     * The number of rows returned by SELECT queries.
     */
    public int $rowCount { get; }

    /**
     * The number of columns in the result set.
     */
    public int $columnCount { get; }

    /**
     * The column names from the result set.
     *
     * @var array<int, string>
     */
    public array $columns { get; }

    /**
     * Checks if any rows were affected by the operation.
     */
    public function hasAffectedRows(): bool;

    /**
     * Checks if an auto-increment ID was generated.
     */
    public function hasLastInsertId(): bool;

    /**
     * Checks if the result set is empty (no rows returned).
     */
    public function isEmpty(): bool;

    /**
     * Fetches the next row as an associative array.
     *
     * @return array<string, mixed>|null
     */
    public function fetchAssoc(): ?array;

    /**
     * Fetches all rows as an array of associative arrays.
     *
     * @return array<int, array<string, mixed>>
     */
    public function fetchAll(): array;

    /**
     * Fetches a single column from all rows.
     *
     * @return array<int, mixed>
     */
    public function fetchColumn(string|int $column = 0): array;

    /**
     * Fetches the first row, or null if empty or non-SELECT.
     *
     * @return array<string, mixed>|null
     */
    public function fetchOne(): ?array;

    /**
     * Allows iteration in foreach loops.
     */
    public function getIterator(): \Traversable;
}