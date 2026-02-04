<?php

declare(strict_types=1);

namespace Hibla\Sql\Exceptions;

/**
 * Thrown when a deadlock is detected during transaction execution.
 */
class DeadlockException extends TransactionException
{
}
