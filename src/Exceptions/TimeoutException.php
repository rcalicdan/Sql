<?php

declare(strict_types=1);

namespace Hibla\Sql\Exceptions;

use RuntimeException;

/**
 * Thrown when a database timeout occurs (query timeout, connection timeout).
 */
class TimeoutException extends RuntimeException
{
}
