<?php

declare(strict_types=1);

namespace Hibla\Sql;

/**
 * Marker interface for transaction isolation levels.
 *
 * Allows database-specific implementations while maintaining type safety.
 */
interface IsolationLevelInterface
{
    public function getValue(): string;
}
