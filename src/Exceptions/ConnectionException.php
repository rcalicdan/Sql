<?php

declare(strict_types=1);

namespace Hibla\Sql\Exceptions;

use RuntimeException;

/**
 * Thrown when a connection to the database cannot be established or is lost.
 */
class ConnectionException extends RuntimeException
{
}
