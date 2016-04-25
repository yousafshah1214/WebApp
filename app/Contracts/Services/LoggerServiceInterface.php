<?php

namespace App\Contracts\Services;


use Exception;

interface LoggerServiceInterface extends BaseServiceInterface
{
    /**
     * Exception log method for logging Exceptions properly.
     *
     * @param Exception $e
     * @param $level
     * @return mixed
     */
    public function logException(Exception $e, $level);

    /**
     * Logs Info Message
     *
     * @param string $message
     * @return mixed
     */
    public function logInfoMessage(string $message);
}